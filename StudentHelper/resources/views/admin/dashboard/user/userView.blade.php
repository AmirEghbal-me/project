@extends('admin.dashboard.frame')
@section('nav')
    @include('partials/admin/nav')
@endsection
@section('banner')
    <h1 class="text-white">
        نمایش کاربران
    </h1>
    <p class="text-white link-nav"><a href="/admin/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/admin/userView"> userView</a></p>
@endsection
@section('contents')
    <div class="content">
        <div class="userData">
            @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100">
                            <table>
                                <thead>
                                <tr class="table100-head">
                                    <th class="column3">شناسه</th>
                                    <th class="column3">نام</th>
                                    <th class="column3">نام خانوادگی</th>
                                    <th class="column3">ایمیل</th>
                                    <th class="column3">شماره تلفن</th>
                                    <th class="column3">نوع کاربر</th>
                                    <th class="column3">نام دانشگاه</th>
                                    <th class="column3">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="column3">{{ $user->id }}</td>
                                    <td class="column3">{{ $user->name }}</td>
                                    <td class="column3">{{ $user->family }}</td>
                                    <td class="column3">{{ $user->email }}</td>
                                    <td class="column3">{{ $user->phone_number }}</td>
                                    <td class="column3">{{ $user->user_type() }}</td>
                                    <td class="column3">{{ $user->university_name }}</td>
                                    <td class="column3">
                                        <a href="{{ route('user.delete',$user->id) }}">حذف</a>
                                        <a href="{{ route('user.edit',$user->id) }}">ویرایش</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

