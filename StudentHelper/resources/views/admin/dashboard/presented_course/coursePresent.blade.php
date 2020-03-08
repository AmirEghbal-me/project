<link rel="stylesheet" href="../../../../css/linearicons.css">
<link rel="stylesheet" href="../../../../css/font-awesome.min.css">
<link rel="stylesheet" href="../../../../css/bootstrap.css">
<link rel="stylesheet" href="../../../../css/magnific-popup.css">
<link rel="stylesheet" href="../../../../css/nice-select.css">
<link rel="stylesheet" href="../../../../css/animate.min.css">
<link rel="stylesheet" href="../../../../css/owl.carousel.css">
<link rel="stylesheet" href="../../../../css/jquery-ui.css">
<link rel="stylesheet" href="../../../../css/main.css">
<link rel="stylesheet" href="../../../../css/select2.min.css">
<link rel="stylesheet" href="../../../../css/animate.css">
<link rel="stylesheet" href="../../../../css/util.css">
<link rel="stylesheet" href="../../../../css/perfect-scrollbar.css">
<link rel="stylesheet" href="../../../../css/nice-select.css">
<link rel="stylesheet" href="../../../../css/main_table.css">
@extends('admin.dashboard.frame')
@section('nav')
    @include('partials/admin/nav')
@endsection
@section('banner')
    <h1 class="text-white">
        ارایه درس
    </h1>
    <p class="text-white link-nav"><a href="/admin/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>/admin/course/present</p>
@endsection
@section('contents')
    <div class="content">
        <div class="register courseRegister">
            <div class="col-lg-12">
                <form action = "{{--{{ route('coursePresent.post.Register') }}--}}" method = "post">
                    {{ csrf_field() }}
                    <div class="limiter">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100">
                                    <table>
                                        <thead>
                                        <tr class="table100-head">
                                            <th class="column1 text-center">ترم</th>
                                            <th class="column2 text-center"> استاد</th>
                                            <th class="column3 text-center">زمان جلسه اول</th>
                                            <th class="column4 text-center">نوع جلسه دوم</th>
                                            <th class="column5 text-center">زمان جلسه دوم</th>
                                            <th class="column6 text-center">نام درس</th>
                                            <th class="column7 text-center">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="column1 text-center">
                                                <select name="term_year">
                                                    <option value="97">1397</option>
                                                    <option value="98">1398</option>
                                                    <option value="99">1399</option>
                                                </select>
                                                <select name="term_season">
                                                    <option value="1">پاییز</option>
                                                    <option value="2">زمستان</option>
                                                    <option value="3">تابستان</option>
                                                </select>
                                            </td>
                                            <td class="column2 text-center">
                                                <select name="teacher_id">
                                                    @foreach($teachers as $teacher)
                                                        <option value="{{ $teacher->id }}">{{ $teacher->family }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="column3 text-center">
                                                <select name="session1_day">
                                                    <option value="1">شنبه</option>
                                                    <option value="2">یکشنبه</option>
                                                    <option value="3">دوشنبه</option>
                                                    <option value="4">سه شنبه</option>
                                                    <option value="5">چهارشنبه</option>
                                                    <option value="6">پنج شنبه</option>
                                                </select>
                                                <select name="session1_hour">
                                                    <option value="1">8</option>
                                                    <option value="2">10</option>
                                                    <option value="3">12</option>
                                                    <option value="4">14</option>
                                                    <option value="5">16</option>
                                                    <option value="6">18</option>
                                                </select>
                                            </td>
                                            <td class="column4 text-center">
                                                <select name="session2_type" id="session2_type" onchange="session2()">
                                                    <option value="ندارد">ندارد</option>
                                                    <option value="هفته فرد">هفته فرد</option>
                                                    <option value="هفته زوج">هفته زوج</option>
                                                    <option value="ثابت">ثابت</option>
                                                </select>
                                            </td>
                                            <td class="column5 text-center" id="session2_time" style="visibility: hidden;">
                                                <select name="session2_day">
                                                    <option value="1">شنبه</option>
                                                    <option value="2">یکشنبه</option>
                                                    <option value="3">دوشنبه</option>
                                                    <option value="4">سه شنبه</option>
                                                    <option value="5">چهارشنبه</option>
                                                    <option value="6">پنج شنبه</option>
                                                </select>
                                                <select name="session2_hour" >
                                                    <option value="1">8</option>
                                                    <option value="2">10</option>
                                                    <option value="3">12</option>
                                                    <option value="4">14</option>
                                                    <option value="5">16</option>
                                                    <option value="6">18</option>
                                                </select>
                                            </td>
                                            <td class="column6 text-center"><select name="course_code">
                                                    @foreach($course as $courses)
                                                        <option value="{{ $courses->course_code }}">{{ $courses->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="column7 text-center">
                                                <input class="register_user registerd genric-btn success circle" type = 'submit' value = "افزودن"/>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        function session2() {
            /*alert(document.getElementById('session2_type').value);*/
            /*if (document.getElementById('session2_type').value != 'ندارد') {
                alert(document.getElementsByClassName('session2').innerText);
            }*/
            //document.getElementsByName('session2_day').style.enable();
            if (document.getElementById('session2_type').value != 'ندارد'){
                document.getElementById('session2_time').style.visibility = "visible";
            }
            else {
                document.getElementById('session2_time').style.visibility = "hidden";
            }

        }
    </script>
@endsection
<script src="../../../../js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.../../js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="../../../../js/vendor/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
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
