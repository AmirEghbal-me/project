<link rel="stylesheet" href="../../css/linearicons.css">
<link rel="stylesheet" href="../../css/font-awesome.min.css">
<link rel="stylesheet" href="../../css/bootstrap.css">
<link rel="stylesheet" href="../../css/magnific-popup.css">
<link rel="stylesheet" href="../../css/nice-select.css">
<link rel="stylesheet" href="../../css/animate.min.css">
<link rel="stylesheet" href="../../css/owl.carousel.css">
<link rel="stylesheet" href="../../css/jquery-ui.css">
<link rel="stylesheet" href="../../css/main.css">
<link rel="stylesheet" href="../../css/main_table.css">
@extends('admin.dashboard.frame')
@section('nav')
    @include('partials/admin/nav')
@endsection
@section('banner')
    <h1 class="text-white">
        ویرایش درس
    </h1>
    <p class="text-white link-nav"><a href="/admin/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/admin/userView"> userView</a></p>
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
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="column1 text-center"><input class="user_register" type='text' name='name' value="{{ old('name',isset($courseItem) ? $courseItem->name: '') }}" /></td>
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
                                    </tr>
                                    </tbody>
                                </table>
                                <input class="register_user genric-btn success circle" type = 'submit' value = "ثبت"/>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<script src="../../../../js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.../../js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="../../../../js/vendor/bootstrap.min.js"></script>
<script src="../../../../js/easing.min.js"></script>
<script src="../../../../js/hoverIntent.js"></script>
<script src="../../../../js/superfish.min.js"></script>
<script src="../../../../js/jquery.ajaxchimp.min.js"></script>
<script src="../../../../js/jquery.magnific-popup.min.js"></script>
<script src="../../../../js/jquery.tabs.min.js"></script>
<script src="../../../../js/jquery.nice-select.min.js"></script>
<script src="../../../../js/owl.carousel.min.js"></script>
<script src="../../../../js/mail-script.js"></script>
<script src="../../../../js/main.js"></script>
