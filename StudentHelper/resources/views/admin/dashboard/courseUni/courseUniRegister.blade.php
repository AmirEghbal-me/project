<link rel="stylesheet" href="../../../../css/linearicons.css">
<link rel="stylesheet" href="../../../../css/font-awesome.min.css">
<link rel="stylesheet" href="../../../../css/bootstrap.css">
<link rel="stylesheet" href="../../../../css/magnific-popup.css">
<link rel="stylesheet" href="../../../../css/nice-select.css">
<link rel="stylesheet" href="../../../../css/animate.min.css">
<link rel="stylesheet" href="../../../../css/owl.carousel.css">
<link rel="stylesheet" href="../../../../css/jquery-ui.css">
<link rel="stylesheet" href="../../../../css/main.css">
@extends('admin.dashboard.frame')
@section('nav')
    @include('partials/admin/nav')
@endsection
@section('banner')
    <h1 class="text-white">
        لیست دروس دانشگاه
    </h1>
    <p class="text-white link-nav"><a href="/admin/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>admin/university/course/add</p>
@endsection
@section('contents')
    <div class="content">
        <div class="register courseSync">
            <div class="col-lg-12">
                @if($courses && count($courses) > 0)
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <ul>
                            @foreach($courses as $course)
                                <li>
                                    <input type="checkbox" name="courses[]" value="{{ $course->course_code }}" {{ isset($uniCourse) && in_array($course->course_code, $uniCourse) ? 'checked':'' }}>
                                    <p class="uniCourseFrm">{{ $course->name }}</p>
                                </li>
                            @endforeach
                        </ul>
                        <div>
                            <input type="submit" name="submit_package_files" class="genric-btn success circle" style="color: black; font-size: 15px;" value="افزودن">
                        </div>
                    </form>
                @endif
                <script>
                    function confirm() {
                        var uni = document.getElementById("university");
                        var UniValue = uni.options[uni.selectedIndex].text;

                        var course = document.getElementById("course");
                        var CourseValue = course.options[course.selectedIndex].text;

                        /*var table = document.getElementById("SelectedUni");
                        var row = table.insertRow(1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        cell1.innerHTML = UniValue;
                        cell2.innerHTML = CourseValue;*/
                        document.getElementById("input_course").value = CourseValue;
                        document.getElementById("input_uni").value = UniValue;

                    }
                    function remove() {
                        var table = document.getElementById("SelectedUni");
                        var row = table.deleteRow(1);
                    }
                </script>

            </div>
        </div>
    </div>
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
