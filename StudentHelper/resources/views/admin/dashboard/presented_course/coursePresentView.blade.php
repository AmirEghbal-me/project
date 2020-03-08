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
        دروس ارایه شده ترم
    </h1>
    <p class="text-white link-nav"><a href="/admin/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>/admin/course/presented/view</p>
@endsection
@section('contents')
    <div class="content">
        <div class="coursePresentData">
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100">
                            <table>
                                <thead>
                                <tr class="table100-head">
                                    <th class="column3 text-center">شماره ترم</th>
                                    <th class="column2 text-center">نام استاد</th>
                                    <th class="column3 text-center">زمان جلسه اول</th>
                                    <th class="column5 text-center">زمان جلسه دوم</th>
                                    <th class="column4 text-center">نوع جلسه دوم</th>
                                    <th class="column1 text-center">نام درس</th>
                                    <th class="column7 text-center">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($termCourses as $value)
                                <tr>

                                    <td class="column1 text-center">{{ $value->term_number }}</td>
                                    <td class="column2 text-center">{{ $value->teacher_name }}</td>
                                    <td class="column3 text-center">
                                        {{ $value->day_of_week[$value->session1_day] }}  {{ $value->day_hours[$value->session1_hour] }}
                                    </td>
                                    <td class="column4 text-center">
                                        @if(isset($value->session2_time))
                                            {{ $value->day_of_week[$value->session2_day] }} {{ $value->day_hours[$value->session2_hour] }}
                                            @endif
                                    </td>
                                    <td class="column5 text-center">{{ $value->session2_type }}</td>
                                    <td class="column8 text-center">{{ $value->course_name }}</td>
                                    <td class="column7 text-center">
                                        <a href="{{ route('coursePresent.delete',$value->university_course_id) }}">حذف</a>
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
<script src="../../../../js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.../../../../js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
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
<script src="../../../../js/main_table.js"></script>
<script src="../../../../js/select2.js"></script>
