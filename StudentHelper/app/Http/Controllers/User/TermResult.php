<?php

namespace App\Http\Controllers\user;

use App\Models\course;
use App\Models\SelectUnit;
use App\Models\UniversityCourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\DeclareDeclare;

class TermResult extends Controller
{
    public function enterGrade()
    {
        $user_id = Auth::user()->id;
        $course_selected = SelectUnit::where('student_id','=',$user_id)->get();
        $university_course_id = $course_selected->pluck('university_course_id');
        for ($x = 0; $x < count($university_course_id); $x++)
            $course_code[$x] =  UniversityCourse::where('university_course_id','=',$university_course_id[$x])->get()->pluck('course_code');
            for ($j = 0; $j < count($course_code); $j++){
            $course[] = course::find($course_code[$j]);
            $course_name[$j] = course::find($course_code[$j])->pluck('name');
            $course_unit[$j] = course::find($course_code[$j])->pluck('unit');
        }

        for ($i = 0; $i < count($course_selected); $i++){
            $course_selected[$i]->course_code = $course_code[$i];
            $course_selected[$i]->course_name = $course_name[$i];
            $course_selected[$i]->course_unit = $course_unit[$i];
        }
        return view('user.dashboard.termResult.enterGrades',compact('course_selected'));
    }
    public function doRegister(Request $request){
        $code[] = $request->input('course_code');
        $grade[] = $request->input('grade');
        for ($i=0; $i < count($code,1)-1; $i++){
            $code[0][$i] = preg_replace('/\D/', '', $code[0][$i]);
        }
        for ($i = 0; $i < count($code, 1) - 1; $i++) {
            $university_course_id[] = UniversityCourse::where('course_code', '=', $code[0][$i])
                ->where('university_id','=',Auth::user()->university_id)
                ->pluck('university_course_id');
            $course_unit[] = course::where('course_code', '=', $code[0][$i])
                ->pluck('unit');
        }
        $total_unit = 0;
        $total_score[]= 0;
        $final_score_digit = 0;
        if (count($course_unit)>1){
            for ($q=0; $q<count($course_unit);$q++){
                $total_unit = $total_unit+$course_unit[$q][0];
                $total_score[$q] = $grade[0][$q] * $course_unit[$q][0];
                $final_score_digit = $final_score_digit+$total_score[$q];
            }
        }
        $avg = $final_score_digit / $total_unit;
        $avg= round($avg,2);
        $selected_course = SelectUnit::where('student_id','=',Auth::user()->id)->get();

        for ($k = 0; $k<count($selected_course,1); $k++){
            DB::table('select_units')
                ->where('student_id',Auth::user()->id)
                ->where('university_course_id',$university_course_id[$k][0])
                ->update(['student_grade'=>$grade[0][$k]]);/*echo $grade[0][$k];*/
        }$x = collect(['avg'=>$avg]);
        return redirect()->back()->with(['x' => $avg])->with(['message'=>'نمره با موفقیت ثبت شد!']);
    }
}
