@extends('admin.dashboard.frame')
@section('nav')
    @include('partials/admin/nav')
@endsection
@section('banner')
    <h1 class="text-white">
        لیست دانشگاه ها
    </h1>
    <p class="text-white link-nav"><a href="/admin/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/admin/universityView"> universityView</a></p>
@endsection
@section('contents')

    <div class="content">
        <div class="universityData">
            @if(Session::has('noCourse'))
                <p class="alert alert-danger">{{ Session::get('noCourse') }}</p>
            @endif
                @if(Session::has('noPresentedCourse'))
                    <p class="alert alert-success">{{ Session::get('noPresentedCourse') }}</p>
                @endif
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
                                    <th class="column1 text-center">نام</th>
                                    <th class="column2 text-center">آدرس</th>
                                    <th class="column3 text-center">نشانی اینترنتی</th>
                                    <th class="column4 text-center">شماره تلفن</th>
                                    <th class="column5 text-center">تعداد کل دروس دانشگاه</th>
                                    <th class="column2 text-center">عملیات</th>
                                    <th class="column1 text-center">ارایه درس</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($universities as $university)
                                <tr>
                                    <td class="column1 text-center">{{ $university->name }}</td>
                                    <td class="column2 address text-center">{{ $university->address }}</td>
                                    <td class="column3 text-center">{{ $university->url }}</td>
                                    <td class="column4 text-center">{{ $university->phone_number }}</td>
                                    <td class="column5 text-center">{{ $university->courses()->get()->count() }}</td>
                                    <td class="column2 text-center">
                                        <a class="iconLink" data-toggle="tooltip" title="ثبت دروس!" href="{{ route('uni.course.add',[$university->university_id]) }}">
                                            <img class="logo" src="../img/list.png"/>
                                        </a><br/>
                                        <a class="iconLink" data-toggle="tooltip" title="حذف دانشگاه" href="{{ route('university.delete',[$university->university_id]) }}">
                                            <img class="logo" src="../img/delete.png"/>
                                        </a><br/>
                                        <a class="iconLink" data-toggle="tooltip" title="ویرایش دانشگاه"  href="{{ route('university.edit',[$university->university_id]) }}">
                                            <img class="logo" src="../img/edit.png"/>
                                        </a><br/>
                                    </td>
                                    <td class="column1 text-center">
                                        <a href="{{ route('university.course.present',[$university->university_id]) }}">ثبت دروس ارایه شده ترم</a><br/>
                                        <a data-toggle="tooltip" title="مشاهده دروس"   href="{{ route('university.course.view',[$university->university_id]) }}">
                                            <img class="logo" src="../img/sid-view.png"/>
                                        </a><br/>
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

