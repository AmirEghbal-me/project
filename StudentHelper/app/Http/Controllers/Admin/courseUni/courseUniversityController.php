<?php

namespace App\Http\Controllers\Admin\courseUni;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class courseUniversityController extends Controller
{
    public function create()
    {
        /*return view('CourseUniversity.create');*/
        $university = DB::table('university')->get();
        $course = DB::table('course')->get();
        return view('admin.dashboard.courseUni.courseUniRegister', ['university' => $university,'course' => $course]);
    }

    public function store(Request $request)
    {
        /*$course_name = $request->input('course');*/

        $course_name = $request->input('course');
        $university_name = $request->input('university');

        $insert_course_id = DB::table('course')->where('name', $course_name)->value('course_id');
        $insert_course_code = DB::table('course')->where('name', $course_name)->value('course_code');
        $insert_university_id = DB::table('university')->where('name', $university_name)->value('university_id');

        /* dd($insert_course_id, $insert_course_code, $insert_university_id);*/

        $data = array('course_id'=>$insert_course_id, 'university_id'=>$insert_university_id, 'course_code'=>$insert_course_code);
        DB::table('course_universities')->insert($data);
        return view('/admin/dashboard');



        /*$course_id = DB::select(DB::raw('select course_id from course where name = :course_name'),array('course_name' => $course_name));*/

        /* $course_id = DB::select("select course_id from course where name='$course_name';") ;
         $university_id = DB::select(DB::raw('select university_id from universities where name = :university_name'),array('university_name' => $university_name));
         $course_code = DB::select(DB::raw('select Course_code from course where name = :course_name'),array('course_name' => $course_name));*/


        /*print_r($course_id);*/
        /*$data = array('course_id'=>$course_id, 'university_id'=>$university_id, 'course_code'=>$course_code);
        DB::table('course_universities')->insert($data);*/

    }

    public function retrieve()
    {
        $CourseUniversity = DB::select('select * from course_universities');
        return view('/admin/dashboard/courseUni/courseUniView',['CourseUniversity'=>$CourseUniversity]);
    }
}
