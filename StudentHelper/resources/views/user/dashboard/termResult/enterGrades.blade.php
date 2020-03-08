<link rel="stylesheet" href="../../../../css/linearicons.css">
<link rel="stylesheet" href="../../../../css/font-awesome.min.css">
<link rel="stylesheet" href="../../../../css/bootstrap.css">
<link rel="stylesheet" href="../../../../css/magnific-popup.css">
<link rel="stylesheet" href="../../../../css/nice-select.css">
<link rel="stylesheet" href="../../../../css/animate.min.css">
<link rel="stylesheet" href="../../../../css/owl.carousel.css">
<link rel="stylesheet" href="../../../../css/jquery-ui.css">
<link rel="stylesheet" href="../../../../css/main.css">
<link rel="stylesheet" href="../../../../css/main_table.css">
@extends('user.dashboard.frame')
@section('nav')
    @include('partials/user/nav')
@endsection
@section('banner')
    <h1 class="text-white">
        ورود نمره(تخمین شما)
    </h1>
    <p class="text-white link-nav"><a href="/user/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/user/course/grades"> /user/course/grades</a></p>
@endsection

@section('contents')
    <div class="content">
        <div class="universityData">
            <div class="limiter">
                @if(Session::has('message'))
                    <p class="bg-success text-center">
                        {{ Session::get('message') }}
                        <br/>
                        @if(Session::has('x'))
                            <span>  معدل:</span><?php echo Session::get('x'); ?>
                        @endif
                    </p>
                @endif
                <div class="container-table100">
                    <div class="wrap-table100 enterGrade">
                        <div class="table100">
                            <form action = "" method = "post">
                                {{ csrf_field() }}
                                <table>
                                    <thead>
                                    <tr class="table100-head">
                                        <th class="column1 text-center">نام درس</th>
                                        <th class="column1 text-center">تعداد واحد</th>
                                        <th class="column1 text-center">ورود نمره</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($course_selected as $value)
                                        <tr>
                                            <td class="column1 text-center">
                                                {{ $value->course_name[0] }}
                                            </td>
                                            <td class="column1 text-center">
                                                {{ $value->course_unit[0] }}
                                            </td>
                                            <td class="column1 text-center">
                                                <input type="text" name="course_code[]" class="form-control" hidden value="{{ $value->course_code }}">
                                                <input type="text" name="grade[]" value="{{ old('student_grade',isset($value) ? $value->student_grade: '') }}" class="form-control" required>
                                            </td>
                                        </tr>
                                    @endforeach
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



<script src="../../js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.../../js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="../../js/vendor/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="../../js/easing.min.js"></script>
<script src="../../js/hoverIntent.js"></script>
<script src="../../js/superfish.min.js"></script>
<script src="../../js/jquery.ajaxchimp.min.js"></script>
<script src="../../js/jquery.magnific-popup.min.js"></script>
<script src="../../js/jquery.tabs.min.js"></script>
<script src="../../js/jquery.nice-select.min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/mail-script.js"></script>
<script src="../../js/main.js"></script>
