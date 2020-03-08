@extends('user.dashboard.frame')
@section('nav')
    @include('partials/user/nav')
@endsection
@section('banner')
    <h1 class="text-white">
        نمایش کاربران
    </h1>
    <p class="text-white link-nav"><a href="/admin/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/admin/userView"> userView</a></p>
@endsection
@section('contents')
    <div class="content">
        <div class="coursePresentData">

            <table border = 1>
                <tr>
                    <td>شماره ترم</td>
                    <td>نام استاد</td>
                    <td>زمان جلسه اول</td>
                    <td>زمان جلسه دوم</td>
                    <td>نوع جلسه دوم</td>
                    <td>نام درس</td>
                    <td>عملیات</td>
                </tr>
                @foreach($termCourses as $value)
                    <tr>
                        <?php
                        $year = substr($value->term_number,0,2);
                        $season_digit = substr($value->term_number,2,1);
                        switch ($season_digit){
                            case 1:
                                $season_name = 'پاییز';
                                break;
                            case 2:
                                $season_name = 'زمستان';
                                break;
                            case 3:
                                $season_name = 'تابستان';
                        }
                        ?>
                        <td>{{ $season_name.$year }}</td>
                        <td>{{ $value->teacher_name }}</td>
                        <td>{{ $value->day_of_week[$value->session1_day-1].' '.$value->session1_hour }}</td>
                        <td>
                            @if($value->session2_type !='ندارد')
                                {{ $value->day_of_week[$value->session2_day-1].' '.$value->session2_hour }}
                            @else
                                ''
                            @endif
                        </td>
                        <td>{{ $value->session2_type }}</td>
                        <td>{{ $value->course_name }}</td>
                        <td>
                            <a href="{{ route('post.selectUnit',$value->university_course_id) }}">انتخاب</a>
                        </td>

                    </tr>
                @endforeach

            </table>
            برای بازگشت.<a href = "{{ route('userDashboard') }}">اینجا کلیک کنید</a>

        </div>
    </div>
@endsection
