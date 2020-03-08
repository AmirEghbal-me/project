<link rel="stylesheet" href="../../../../../../../../css/linearicons.css">
<link rel="stylesheet" href="../../../../../../../../css/font-awesome.min.css">
<link rel="stylesheet" href="../../../../../../../../css/bootstrap.css">
<link rel="stylesheet" href="../../../../../../../../css/magnific-popup.css">
<link rel="stylesheet" href="../../../../../../../../css/nice-select.css">
<link rel="stylesheet" href="../../../../../../../../css/animate.min.css">
<link rel="stylesheet" href="../../../../../../../../css/owl.carousel.css">
<link rel="stylesheet" href="../../../../../../../../css/jquery-ui.css">
<link rel="stylesheet" href="../../../../../../../../css/main.css">
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

            <table border = 1>
                <tr>
                    <td>شناسه درس</td>
                    <td>شناسه دانشگاه</td>
                    <td>کد درس</td>
                </tr>
                @foreach ($CourseUniversity as $CourseUniversity)
                    <tr>
                        <td>{{ $CourseUniversity->course_id }}</td>
                        <td>{{ $CourseUniversity->university_id }}</td>
                        <td>{{ $CourseUniversity->course_code }}</td>
                    </tr>
                @endforeach
            </table>
            برای بازگشت.<a href = "{{ route('adminDashboard') }}">اینجا کلیک کنید</a>

        </div>
    </div>
@endsection
