<?php

namespace App\Http\Controllers\Admin\course;

use App\Models\Prerequisite_sibling;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\course;

class CourseController extends Controller
{
    public function create()
    {
        $course = course::all();
        return view('admin.dashboard.course.courseRegister',compact('course'));
    }
    public function present(Request $request)
    {
        $course_code = rand(10000,99999);
        Prerequisite_sibling::create([
            'course_code'=>$course_code,
            'course_prerequisite'=>$request->input('course_prerequisite'),
            'course_siblings'=>$request->input('course_siblings')
        ]);
        course::create([
            'course_code'=>rand(10000,99999),
            'name'=>$request->input('name'),
            'unit'=>$request->input('unit'),
            'type'=>$request->input('type'),
            'presentation_type'=>$request->input('presentation_type'),
            'field'=>$request->input('field')
        ]);
        return redirect()->route('course.view')->with('message','عملیات با موفقیت انجام شد');
    }
    public function retrieve()
    {
        $courses = course::all();
        return view('admin.dashboard.course.courseView',compact('courses'));
    }

    public function delete($course_code)
    {
        if($course_code && ctype_digit($course_code)){
            $courseList =course::find($course_code);
            //dd($courseList);
            if ($courseList && $courseList instanceof course){
                $courseList->delete();
                return redirect()->route('course.view')->with('message','درس مورد نظر با موفقیت حذف شد');
            }
        }
    }

    public function edit($course_code)
    {
        if ($course_code && ctype_digit($course_code)){
            $courseItem = course::find($course_code);
            if ($courseItem && $courseItem instanceof course){
                return view('admin.dashboard.course.courseEdit',compact('courseItem'));
            }
        }
    }

    public function update(Request $request,$course_code)
    {
        $items = [
            'name'=>$request->input('name'),
            'unit'=>$request->input('unit'),
            'type'=>$request->input('type'),
            'presentation_type'=>$request->input('presentation_type'),
            'field'=>$request->input('field')
        ];
        $courseItem = course::find($course_code);
        $courseItem->update($items);
        return redirect()->route('course.view')->with('message','ویرایش با موفقیت انجام شد');
    }
}
