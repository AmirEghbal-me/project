<?php
namespace App\Http\Controllers\Admin\course;
use App\Models\course;
use App\Models\TermPresentedCourse;
use App\Models\university;
use App\Models\UniversityCourse;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoursePresentController extends Controller
{
    public function present($university_id)
    {
        $university_Item = university::find($university_id);
        $uniCourseCode = $university_Item->uniCourses()->get()->pluck('course_code')->toarray();
        if (count($uniCourseCode)!= 0){
            $uniCourseId = $university_Item->uniCourses()->get();
            $course = course::find($uniCourseCode);
            $teachers = DB::select('select * from users where role = 2');
            return view('admin.dashboard.presented_course.coursePresent',compact('uniCourseId','teachers', 'course'));
        }
        else{
            return redirect()->back()->with('noCourse','درسی برای ارایه وجود ندارد');
        }
    }

    public function store(Request $request,$university_id)
    {
        $course_code = $request->input('course_code');
        //$university_courses = UniversityCourse::find($course_code);
        $university_course_id =
            DB::table('university_courses')
                ->where('course_code',$course_code)
                ->where('university_id','=',$university_id)
                ->value('university_course_id');
        //$university_course_id = $university_courses->pluck('university_course_id');dd($university_course_id);

        $term_year = $request->input('term_year');
        $term_season = $request->input('term_season');
        $term_number = $term_year.$term_season;
        $session1_day = $request->input('session1_day');
        $session1_hour = $request->input('session1_hour');
        $session1_time = $session1_day.$session1_hour;

        $session2_type = $request->input('session2_type');
        $session2_day = $request->input('session2_day');
        $session2_hour = $request->input('session2_hour');
        $session2_time = '';
        if ($session2_type == 'ندارد'){
            $data = [
                'term_course_id' => rand(100000,9999990),
                'university_course_id'=>$university_course_id,
                'term_number'=>$term_number,
                'teacher_id'=>$request->input('teacher_id'),
                'session1_time'=>$session1_time,
                'session2_type'=>$session2_type,
                'course_code'=>$course_code
            ];
        }
        else{
                $data = [
                    'term_course_id' => rand(100000, 9999990),
                    'university_course_id' => $university_course_id,
                    'term_number' => $term_number,
                    'teacher_id' => $request->input('teacher_id'),
                    'session1_time' => $session1_time,
                    'session2_time' => $session2_day . $session2_hour,
                    'session2_type' => $session2_type,
                    'course_code' => $course_code
                ];
        }
        TermPresentedCourse::create($data);
        return redirect()->route('university.view')->with('noPresentedCourse','ارایه درس با موفقیت انجام شد');
    }
    public function retrieve($id)
    {
        $university_course_id = UniversityCourse::where('university_id','=',$id)->get()->pluck('university_course_id');

        if (count($university_course_id)>0) {
            for ($i = 0; $i < count($university_course_id); $i++) {
                //$termCourses = TermPresentedCourse::where('university_course_id', '=', $university_course_id[$i])->get();
                $termCourses = TermPresentedCourse::find($university_course_id);
            }
            $course_code = $termCourses->pluck('course_code');
            $course_name[] = course::find($course_code)->pluck('name');
            for ($i = 0; $i < count($termCourses); $i++) {

                $teacher_id[] = $termCourses->pluck('teacher_id');
                $teacher_name[] = User::find($teacher_id[$i])->pluck('family');

                $session1_time[] = $termCourses->pluck('session1_time');
                $session2_time[] = $termCourses->pluck('session2_time');
                $session2_type[] = $termCourses->pluck('session2_type');
            }
            $day_of_week = ['شنبه', 'یکشنبه', 'دوشنبه', 'سه شنبه', 'چهارشنبه', 'پنج شنبه'];
            $day_hours = ['0', '8', '10', '12 ', '14', '16', '18'];
            for ($i = 0; $i < count($termCourses); $i++) {
                $session1_day[] = substr($session1_time[0][$i], 0, 1);
                $session1_hour[] = substr($session1_time[0][$i], 1, 1);
            }
            if ($session2_type != 'ندارد') {
                /*foreach($session2_time as $v){
                    $session2_day[] = substr($v, 0, 1);
                    $session2_hour[] = substr($v, 1, 1);
                }*/
                for ($i = 0; $i < count($termCourses); $i++) {
                    if ($session2_time[$i] != false) {
                        $session2_day[] = substr($session2_time[0][$i], 0, 1);
                        $session2_hour[] = substr($session2_time[0][$i], 1, 1);
                    } else {
                        $session2_day[] = '';
                        $session2_hour[] = '';
                    }
                }
            }

            for ($i = 0; $i < count($termCourses); $i++) {
                $termCourses[$i]->course_name = $course_name[0][$i];
                $termCourses[$i]->day_of_week = $day_of_week;
                $termCourses[$i]->day_hours = $day_hours;
                $termCourses[$i]->session1_day = $session1_day[$i];
                $termCourses[$i]->session2_day = $session2_day[$i];
                $termCourses[$i]->session1_hour = $session1_hour[$i];
                $termCourses[$i]->session2_hour = $session2_hour[$i];
                if (count($teacher_name) >= count($course_name)) {
                    $termCourses[$i]->teacher_name = $teacher_name[$i][0];
                } else {
                    $termCourses[$i]->teacher_name = $teacher_name[0];
                }
            }//dd($termCourses);
            return view('admin.dashboard.presented_course.coursePresentView', compact('termCourses'));
        }
        else{
            return redirect()->back()->with('noCourse','هنوز درسی ارایه نشده');
        }
    }
    public function delete($university_course_id)
    {
        if ($university_course_id && ctype_digit($university_course_id)){
            $term_presented_course = TermPresentedCourse::find($university_course_id);
            if ($term_presented_course && $term_presented_course instanceof TermPresentedCourse){
                $term_presented_course->delete();
                return redirect()->route('adminDashboard');
            }
        }
    }
}
