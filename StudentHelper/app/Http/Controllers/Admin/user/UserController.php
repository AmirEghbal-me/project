<?php

namespace App\Http\Controllers\Admin\user;

use App\Models\university;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userRegister()
    {
        $universities = university::all();
        return view('admin.dashboard.user.userRegister',compact('universities'));
    }
    public function userDoRegister(Request $request)
    {
        $uni_id = $request->input('university_id');
        $uni_name =DB::table('university')
            ->where('university_id',$uni_id)
            ->value('name');
        if ($request->input('role')==1){
            User::create(
                [
                    'id'=>rand(100000000,999999999),
                    'name' =>$request->input('name'),
                    'family' =>$request->input('family'),
                    'email'=>$request->input('email'),
                    'phone_number'=>$request->input('phone_number'),
                    'password'=>$request->input('password'),
                    'role'=>$request->input('role'),
                ]);
        }
        else{
            User::create(
                [
                    'id'=>rand(100000000,999999999),
                    'name' =>$request->input('name'),
                    'family' =>$request->input('family'),
                    'email'=>$request->input('email'),
                    'phone_number'=>$request->input('phone_number'),
                    'password'=>$request->input('password'),
                    'role'=>$request->input('role'),
                    'university_id'=>$request->input('university_id'),
                    'university_name'=>$uni_name
                ]
            );
        }


        return redirect()->route('user.view')->with('message','کاربر مورد نظر با موفقیت ایجاد شد');
    }
    public function userView()
    {
        $users = User::all();
        return view('admin.dashboard.user.userView',compact('users'));
    }

    public function delete($user_id)
    {
        if ($user_id && ctype_digit($user_id)){
            $user = User::find($user_id);
            if ($user && $user instanceof User){
                $user->delete();
                return redirect()->route('user.view')->with('message','حذف با موفقیت انچام شد');
            }
        }
    }

    public function edit($user_id)
    {

        if($user_id && ctype_digit($user_id)){
            $userItem = User::find($user_id);
            if ($userItem && $userItem instanceof User){
                return view('admin.dashboard.user.userEdit',compact('userItem'));
            }
        }
    }
    public function update(Request $request,$user_id)
    {

        $input = [
            'name'=>$request->input('name'),
            'family'=>$request->input('family'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
            'phone_number'=>$request->input('phone_number'),

        ];


        if (!$request->has('password')){
            unset($input['password']);
        }
        $userItem = User::find($user_id);
        $userItem->update($input);
        return redirect()->route('user.view')->with('message','ویرایش کاربر موفقیت آمیز بود');
    }
}
