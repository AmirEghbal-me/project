<?php

namespace App\Http\Controllers\Admin\university;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\university;
class UniversityController extends Controller
{
    public function Add()
    {
        return view('admin.dashboard.university.universityRegister');
    }

    public function StoreData(Request $request)
    {
        university::create([
            'university_id'=>rand(10000,99999),
            'name'=>$request->input('name'),
            'address'=>$request->input('address'),
            'url'=>$request->input('url'),
            'phone_number'=>$request->input('phone_number'),
        ]);
        return redirect()->route('university.view')->with('message','دانشگاه با موفقت ثبت شد');
    }
    public function retrieve()
    {
        $universities = university::all();
        return view('admin.dashboard.university.universityView',compact('universities'));
    }

    public function syncCourse(Request $request, $university_id)
    {
        $courses = course::all();
        $uniItem =university::find($university_id);
        $uniCourse = $uniItem->courses()->get()->pluck('course_code')->toarray();
        //dd($uniCourse);
        return view('admin.dashboard.courseUni.courseUniRegister',compact('courses','uniCourse'));
    }

    public function updateSyncCourse(Request $request, $university_id)
    {
        $uniItem =university::find($university_id);
        $courses = $request->input('courses');

        if($uniItem && is_array($courses)){
            $uniItem->courses()->sync($courses);
            return redirect()->route('university.view');
        }
    }

    public function delete($university_id)
    {
        if ($university_id && ctype_digit($university_id)){
            $uni = university::find($university_id);
            if ($uni && $uni instanceof university){
                $uni->delete();
                return redirect()->route('university.view')->with('message','دانشگاه مورد نطر با موفقیت حذف شد');
            }
        }
    }

    public function edit($university_id)
    {
        if ($university_id && ctype_digit($university_id)){
            $universityItem = university::find($university_id);
            if ($universityItem && $universityItem instanceof university){
                return view('admin.dashboard.university.universityEdit',compact('universityItem'));
            }
        }
    }

    public function update(Request $request, $university_id)
    {
        $input = [
            'name'=>$request->input('name'),
            'address'=>$request->input('address'),
            'url'=>$request->input('url'),
            'phone_number'=>$request->input('phone_number'),
        ];
        $universityItem = university::find($university_id);
        $universityItem->update($input);
        return redirect()->route('university.view')->with('message','ویرایش با موفقیت انجام شد');
    }
}
