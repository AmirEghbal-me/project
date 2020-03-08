<?php

namespace App\Http\Controllers\user\selectUnit;

use App\Models\course;
use App\Models\SelectUnit;
use App\Models\TermPresentedCourse;
use App\Models\university;
use App\Models\UniversityCourse;
use App\Models\User;
use function Composer\Autoload\includeFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SelectUnitController extends Controller
{
    public function check()
    {
        $user_id = Auth::user()->id;
        $course_selected = SelectUnit::find($user_id);

        if ($course_selected != null)
            return $this->select_again();
        else
            return $this->first_select();
    }
    public function select_again()
    {
        $user_id = Auth::user()->id;
        $course_selected = SelectUnit::where('student_id','=',$user_id)->get();
        $university_id = Auth::user()->university_id;
        $university_course_id = UniversityCourse::where('university_id','=',$university_id)->get()->pluck('university_course_id');
        $term_presented_courses = TermPresentedCourse::find($university_course_id);
        $tp = $term_presented_courses->pluck('university_course_id');
        $cs = $course_selected->pluck('university_course_id');

        for ($i=0; $i<count($term_presented_courses);$i++){
            for ($j=0; $j<count($course_selected); $j++){
                if($tp[$i] == $cs[$j]){
                    $exist[] = $tp[$i];
                }
            }
        }
        for ($i=0; $i<count($term_presented_courses);$i++){
            for ($j=0; $j<count($exist); $j++){
                if($tp[$i] == $exist[$j]){
                    unset($tp[$i]);
                    $i++;
                }
            }
        }
        $selectable_course = TermPresentedCourse::find($tp);
        $course_code = $selectable_course->pluck('course_code');
        for ($i=0; $i<count($selectable_course);$i++){
            $course_name[$i] =
                DB::table('course')
                    ->where('course_code',$course_code[$i])
                    ->value('name');
            $teacher_id[$i] =
                DB::table('term_presented_courses')
                    ->where('course_code',$course_code[$i])
                    ->value('teacher_id');
            $teacher_name[$i] =
                DB::table('users')
                    ->where('id',$teacher_id[$i])
                    ->value('family');
        }
        $session1_time = $selectable_course->pluck('session1_time');
        $session2_time = $selectable_course->pluck('session2_time');
        $session2_type = $selectable_course->pluck('session2_type');
        $day_of_week = ['شنبه', 'یکشنبه', 'دوشنبه', 'سه شنبه', 'چهارشنبه', 'پنج شنبه'];
        $hour = ['0','8','10','12','14','16','18'];

        for($i=0; $i<count($session1_time);$i++) {
            $session1_day[] = substr($session1_time[$i], 0, 1);
            $session1_hour[] = $hour[substr($session1_time[$i], 1, 2)];
        }
        if ($session2_type != 'ندارد') {
            foreach ($session2_time as $v) {
                $session2_day[] = substr($v, 0, 1);
                $session2_hour[] = $hour[substr($v, 1, 2)];
            }
        }
        for ($i = 0; $i < count($selectable_course); $i++) {
            $selectable_course[$i]->course_name = $course_name[$i];
            $selectable_course[$i]->day_of_week = $day_of_week;
            $selectable_course[$i]->session1_day = $session1_day[$i];
            $selectable_course[$i]->session2_day = $session2_day[$i];
            $selectable_course[$i]->session1_hour = $session1_hour[$i];
            $selectable_course[$i]->session2_hour = $session2_hour[$i];
            $selectable_course[$i]->teacher_name = $teacher_name[$i];
        }
        return view('user.dashboard.selectUnit.selectUnit', compact('selectable_course'));
    }
    public function first_select()
    {
        $university_id = Auth::user()->university_id;
        $university_course_id = UniversityCourse::where('university_id','=',$university_id)->get()->pluck('university_course_id');
        $selectable_course = TermPresentedCourse::find($university_course_id);
        if (!isset($selectable_course[0]))
            echo 'درسی ارایه نشده';
        $course_code = $selectable_course->pluck('course_code');
        for ($i=0; $i<count($selectable_course);$i++){
            $course_name[$i] =
                DB::table('course')
                    ->where('course_code',$course_code[$i])
                    ->value('name');
            $teacher_id[$i] =
                DB::table('term_presented_courses')
                    ->where('course_code',$course_code[$i])
                    ->value('teacher_id');
            $teacher_name[$i] =
                DB::table('users')
                    ->where('id',$teacher_id[$i])
                    ->value('family');
        }
        $session1_time = $selectable_course->pluck('session1_time');
        $session2_time = $selectable_course->pluck('session2_time');
        $session2_type = $selectable_course->pluck('session2_type');
        $day_of_week = ['شنبه', 'یکشنبه', 'دوشنبه', 'سه شنبه', 'چهارشنبه', 'پنج شنبه'];
        $hour = ['0','8','10','12','14','16','18'];

        for($i=0; $i<count($session1_time);$i++) {
            $session1_day[] = substr($session1_time[$i], 0, 1);
            $session1_hour[] = $hour[substr($session1_time[$i], 1, 2)];
        }
        if ($session2_type != 'ندارد') {
            foreach ($session2_time as $v) {
                $session2_day[] = substr($v, 0, 1);
                $session2_hour[] = $hour[substr($v, 1, 2)];
            }
        }
        for ($i = 0; $i < count($selectable_course); $i++) {
            $selectable_course[$i]->course_name = $course_name[$i];
            $selectable_course[$i]->day_of_week = $day_of_week;
            $selectable_course[$i]->session1_day = $session1_day[$i];
            $selectable_course[$i]->session2_day = $session2_day[$i];
            $selectable_course[$i]->session1_hour = $session1_hour[$i];
            $selectable_course[$i]->session2_hour = $session2_hour[$i];
            $selectable_course[$i]->teacher_name = $teacher_name[$i];
        }

        return view('user.dashboard.selectUnit.selectUnit', compact('selectable_course'));
    }

    public function doSelect(Request $request, $university_course_id)
    {
        $course_register_id = rand(10000, 99999);
        $student_id = Auth::user()->id;
        $data1 = [
            'course_register_id' => $course_register_id,
            'student_id' => $student_id,
            'university_course_id' => $university_course_id
        ];
        $selected =
            DB::table('select_units')
                ->where('university_course_id',$university_course_id)
                ->value('course_register_id');

            SelectUnit::create($data1);
            return redirect()->route('selectUnitView')->with('message','انتخاب درس موفقیت آمیز بود');

    }

    public function selectedCourseView()
    {
        $student_id = Auth::user()->id;
        $select_unit = SelectUnit::where('student_id','=',$student_id)->get();
        $course_register_id = $select_unit->pluck('course_register_id');
        $university_course_id = $select_unit->pluck('university_course_id');
        $presented_course = TermPresentedCourse::find($university_course_id);

        $session1_time = $presented_course->pluck('session1_time');
        $session2_time = $presented_course->pluck('session2_time');
        $session2_type = $presented_course->pluck('session2_type');
        $clock = ['','8','10','12','14','16','18'];
        foreach ($session1_time as $v) {
            $session1_day[] = substr($v, 0, 1);
            $session1_hour[] = $clock[substr($v, 1, 1)];
        }
        if ($session2_type != 'ندارد') {
            foreach ($session2_time as $v) {
                $session2_day[] = substr($v, 0, 1);
                $session2_hour[] = $clock[substr($v, 1, 1)];
            }
            $day_of_week = ['شنبه', 'یکشنبه', 'دوشنبه', 'سه شنبه', 'چهارشنبه', 'پنج شنبه'];

            $teacher = User::find($presented_course->pluck('teacher_id'));
            //$teacher_name = $teacher->pluck('name');
            //$teacher_family = $teacher->pluck('family');

            for ($x=0; $x<count($select_unit);$x++){
                $teacher_id[$x] =
                    DB::table('term_presented_courses')
                        ->where('university_course_id',$university_course_id[$x])
                        ->value('teacher_id');
                $teacher_name[$x] =
                    DB::table('users')
                        ->where('id',$teacher_id[$x])
                        ->value('name');
                $teacher_family[$x] =
                    DB::table('users')
                        ->where('id',$teacher_id[$x])
                        ->value('family');
                $course[$x] =
                    DB::table('term_presented_courses')
                        ->where('university_course_id',$university_course_id[$x])
                        ->value('course_code');
                $course_name[$x] =
                    DB::table('course')
                        ->where('course_code',$course[$x])
                        ->value('name');
                $course_unit[$x] =
                    DB::table('course')
                        ->where('course_code',$course[$x])
                        ->value('unit');
            }
            $total_unit = 0;
            for ($x = 0; $x < count($course_unit); $x++){
                $total_unit += $course_unit[$x];
            }
            for ($i = 0; $i < count($select_unit); $i++) {
                $select_unit[$i]->total_unit = $total_unit;
                $select_unit[$i]->teacher_name = $teacher_name[$i];
                $select_unit[$i]->teacher_family = $teacher_family[$i];
                $select_unit[$i]->course_name = $course_name[$i];
                $select_unit[$i]->course_unit = $course_unit[$i];
                $select_unit[$i]->session2_type = $session2_type[$i];
                $select_unit[$i]->session1_day = $session1_day[$i];
                $select_unit[$i]->session2_day = $session2_day[$i];
                $select_unit[$i]->session1_hour = $session1_hour[$i];
                $select_unit[$i]->session2_hour = $session2_hour[$i];
                $select_unit[$i]->day_of_week = $day_of_week;//dd($select_unit[0]);
            }
        }
        return view('user.dashboard.selectUnit.selectUnitView', compact('select_unit'));
    }
    public function DeleteUnit($course_register_id){
        DB::delete('delete from select_units where course_register_id = ?',[$course_register_id]);
        return redirect()->back()->with('message','درس مورد نظر حذف شد');
    }
    public function courseWeeksTable(){
        $student_id = Auth::user()->id;
        $selected_unit = SelectUnit::where('student_id','=',$student_id)->get()->pluck('university_course_id');
        /*$university_id = Auth::user()->university_id;
        $university_course_id = UniversityCourse::where('university_id','=',$university_id)->get()->pluck('university_course_id');*/
        $presented_course = TermPresentedCourse::find($selected_unit);
        $session1_time = $presented_course->pluck('session1_time');
        $session2_time = $presented_course->pluck('session2_time');
        $session2_type = $presented_course->pluck('session2_type');


        $times_array = array(
            array('','','','','',''),
            array('','','','','','')
        );
        $courses = $presented_course->pluck('course_code');

        for($i = 0; $i<count($presented_course); $i++) {
            $session1_day[] = substr($session1_time[$i], 0, 1);
            $session1_hour[] = substr($session1_time[$i], 1, 1);
            $session2_day[] = substr($session2_time[$i], 0, 1);
            if ($session2_day[$i]!=null){
                $session2_hour[] = substr($session2_time[$i], 1, 1);
            }
            else
                $session2_hour[] = '';
            $courses_name[] = DB::table('course')
                ->where('course_code',$courses[$i])
                ->value('name');
            $times_array[$session1_day[$i]-1][$session1_hour[$i]-1] =
                $courses_name[$i];

            if ($session2_type[$i] != 'ندارد') {
                $times_array[$session2_day[$i]-1][$session2_hour[$i]-1] =
                    $courses_name[$i] . "(جلسه دوم)";
            }
        }
        return view('user.dashboard.selectUnit.courseWeeksTime',compact('times_array'));
    }
}

