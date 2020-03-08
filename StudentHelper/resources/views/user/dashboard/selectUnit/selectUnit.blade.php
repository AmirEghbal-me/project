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
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100">
                            <table>
                                <thead>
                                <tr class="table100-head">
                                    <th class="column1 text-center">شماره ترم</th>
                                    <td class="column3 text-center">نام استاد</td>
                                    <td class="column3 text-center">زمان جلسه اول</td>
                                    <td class="column1 text-center">زمان جلسه دوم</td>
                                    <td class="column2 text-center">نوع جلسه دوم</td>
                                    <td class="column3 text-center">نام درس</td>
                                    <td class="column1 text-center">عملیات</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($selectable_course as $value)
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
                                        <td class="column1 text-center">
                                            {{ $season_name.$year }}
                                        </td>
                                        <td class="column3 text-center">
                                            {{ $value->teacher_name }}
                                        </td>
                                        <td class="column3 text-center">
                                            {{ $value->day_of_week[$value->session1_day-1].' '.$value->session1_hour }}
                                        </td>
                                        <td class="column1 text-center">
                                            @if($value->session2_type !='ندارد')
                                                {{ $value->day_of_week[$value->session2_day-1].' '.$value->session2_hour }}
                                            @else
                                                ''
                                            @endif
                                        </td>
                                        <td class="column2 text-center">
                                            {{ $value->session2_type }}
                                        </td>
                                        <td class="column3 text-center">
                                            {{ $value->course_name }}
                                        </td>
                                        <td class="column1 text-center">
                                            <a href="{{ route('post.selectUnit',$value->university_course_id) }}">انتخاب</a>
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
    </div>
@endsection

