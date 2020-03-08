@extends('admin.dashboard.frame')
@section('nav')
    @include('partials/admin/nav')
@endsection
@section('banner')
    <h1 class="text-white">
        ثبت درس
    </h1>
    <p class="text-white link-nav"><a href="/admin/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/admin/courseRegister"> courseRegister</a></p>
@endsection
@section('contents')
    <div class="content">
        <div class="universityData">
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100">
                    <form action = "{{ route('course.post.Register') }}" method = "post">
                        {{ csrf_field() }}
                        <table>
                            <thead>
                            <tr class="table100-head">
                                <th class="column1 text-center">نام درس</th>
                                <td class="column3 text-center">تعداد واحد</td>
                                <td class="column3 text-center">نوع درس</td>
                                <td class="column1 text-center">نوع ارائه</td>
                                <td class="column2 text-center">رشته تحصیلی</td>
                                <td class="column3 text-center">پیشنیاز درس</td>
                                <td class="column1 text-center">همنیاز</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="column1 text-center"><input class="user_register" type='text' name='name' placeholder="courses name..." /></td>
                                <td class="column3 text-center">
                                    <select name="unit">
                                        <option value="1">۱ واحد</option>
                                        <option value="2">۲ واحد</option>
                                        <option value="3">۳ واحد</option>
                                    </select>
                                </td>
                                <td class="column3 text-center">
                                    <select name="type">
                                        <option value="عمومی">عمومی</option>
                                        <option value="تخصصی">تخصصی</option>
                                        <option value="پایه">پایه</option>
                                    </select>
                                </td>
                                <td class="column1 text-center">
                                    <select name="presentation_type">
                                        <option value="تئوری">تئوری</option>
                                        <option value="عملی">عملی</option>
                                    </select>
                                </td>
                                <td class="column2 text-center">
                                    <select name="field">
                                        <option value="کامپیوتر">کامپیوتر</option>
                                        <option value="عمران">عمران</option>
                                        <option value="عمران">برق</option>
                                        <option value="عمران">معماری</option>
                                        <option value="عمران">حسابداری</option>
                                    </select>
                                </td>
                                <td class="column3 text-center">
                                    <select name="course_prerequisite">
                                        @foreach($course as $courses)
                                            <option value=""></option>
                                            <option value="{{ $courses->course_code }}">{{ $courses->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="column1 text-center">
                                    <select name="course_siblings">
                                        @foreach($course as $courses)
                                            <option value=""></option>
                                            <option value="{{ $courses->course_code }}">{{ $courses->name }}</option>
                                        @endforeach
                                    </select>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                        <input class="register_user genric-btn success circle" type = 'submit' value = "افزودن"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    </div>
@endsection
