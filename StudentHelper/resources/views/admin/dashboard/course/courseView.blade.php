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
        <div class="courseData">
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
                                    <th class="column1 text-center">کد درس</th>
                                    <th class="column2 text-center">نام</th>
                                    <th class="column3 text-center">تعداد واحد</th>
                                    <th class="column4 text-center">نوع درس</th>
                                    <th class="column5 text-center">نوع ارائه</th>
                                    <th class="column6 text-center">رشته</th>
                                    <th class="column7 text-center">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($courses as $course)
                                <tr>
                                    <td class="column1 text-center">{{ $course->course_code }}</td>
                                    <td class="column2 text-center">{{ $course->name }}</td>
                                    <td class="column3 text-center">{{ $course->unit }}</td>
                                    <td class="column4 text-center">{{ $course->type }}</td>
                                    <td class="column5 text-center">{{ $course->presentation_type }}</td>
                                    <td class="column6 text-center">{{ $course->field }}</td>
                                    <td class="column6 text-center">
                                        <a href="{{ route('course.delete',$course->course_code) }}">حذف</a>
                                        <a href="{{ route('course.edit',$course->course_code) }}">ویرایش</a>
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

