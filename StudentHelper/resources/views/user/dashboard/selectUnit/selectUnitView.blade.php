@extends('user.dashboard.frame')
@section('nav')
    @include('partials/user/nav')
@endsection
@section('banner')
    <h1 class="text-white">
        دروس منتخب ترم
    </h1>
    <p class="text-white link-nav"><a href="/user/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/user/selectUnitView"> selectUnitView</a></p>
@endsection
@section('contents')
    <div class="content">
        <div class="courseData">
            @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
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
                                        <td class="column3 text-center">نام استاد</td>
                                        <td class="column1 text-center">زمان جلسه اول</td>
                                        <td class="column2 text-center">نوع جلسه دوم</td>
                                        <td class="column3 text-center">زمان جلسه دوم</td>
                                        <td class="column1 text-center">عملیات</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($select_unit as $value)
                                        <tr>
                                            <td class="column1 text-center">
                                                {{ $value->course_name }}
                                            </td>
                                            <td class="column3 text-center">
                                                {{ $value->course_unit }}
                                            </td>
                                            <td class="column3 text-center">
                                                {{ $value->teacher_name.' '.$value->teacher_family }}
                                            </td>
                                            <td class="column1 text-center">
                                                {{ $value->day_of_week[$value->session1_day-1].' '.$value->session1_hour }}
                                            </td>
                                            <td class="column2 text-center">
                                                {{ $value->session2_type }}
                                            </td>
                                            <td class="column3 text-center">
                                                @if($value->session2_type !='ندارد')
                                                    {{ $value->day_of_week[$value->session2_day-1].' '.$value->session2_hour }}
                                                @else
                                                    ''
                                                @endif
                                            </td>
                                            <td class="column1 text-center">
                                                <a href="{{ route('delete.unit',$value->course_register_id) }}">حذف</a>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <span>جمع واحدها: {{ $value->total_unit }}</span>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
