<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function homePage()
    {
        return view('index');
    }
    public function adminDashboard()
    {
        return view('admin.dashboard.index');
    }
    public function login()
    {
        return view('index');
    }

    public function doLogin(Request $request)
    {
        $remember= $request->has('remember');
        if (Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],$remember)){
            if (Auth::user()->role == User::Admin)dd(Auth::user());
                //return redirect('/admin/dashboard');
            else
                return redirect('/user/dashboard');
        }
        return redirect()->back()->with('loginError','you are wrong!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }
}
