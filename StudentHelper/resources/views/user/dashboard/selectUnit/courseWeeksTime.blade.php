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
        برنامه هفتگی این ترم
    </h1>
    <p class="text-white link-nav"><a href="/user/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/user/course/weeks/time"> /user/course/weeks/time</a></p>
@endsection
@section('contents')
    <div class="content">
        <div class="universityData">
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100">

                            <table id="courseWeeksTable" class="projectTable">
                                <thead>
                                <tr class="table100-head">
                                    <th class="column1 text-center"></th>
                                    <th class="column1 text-center">8</th>
                                    <td class="column3 text-center">10</td>
                                    <td class="column3 text-center">12</td>
                                    <td class="column1 text-center">14</td>
                                    <td class="column2 text-center">16</td>
                                    <td class="column3 text-center">18</td>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td class="column1 text-center">
                                        شنبه
                                    </td>
                                    <td class="column3 text-center">
                                        {{ $times_array[0][0] }}
                                    </td>
                                    <td class="column3 text-center">
                                        {{ $times_array[0][1] }}
                                    </td>
                                    <td class="column1 text-center">
                                        {{ $times_array[0][2] }}
                                    </td>
                                    <td class="column2 text-center">
                                        {{ $times_array[0][3] }}
                                    </td>
                                    <td class="column3 text-center">
                                        {{ $times_array[0][4] }}
                                    </td>
                                    <td class="column3 text-center">
                                        {{ $times_array[0][5] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column1 text-center">
                                        یکشنبه
                                    </td>
                                    <td class="column3 text-center">
                                        {{ $times_array[1][0] }}
                                    </td>
                                    <td class="column3 text-center">
                                        {{ $times_array[1][1] }}
                                    </td>
                                    <td class="column1 text-center">
                                        {{ $times_array[1][2] }}
                                    </td>
                                    <td class="column2 text-center">
                                        {{ $times_array[1][3] }}
                                    </td>
                                    <td class="column3 text-center">
                                        {{ $times_array[1][4] }}
                                    </td>
                                    <td class="column3 text-center">
                                        {{ $times_array[1][5] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column1 text-center">
                                        دوشنبه
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[2][0])){{ $times_array[2][0] }}@endif
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[2][1])){{ $times_array[2][1] }}@endif
                                    </td>
                                    <td class="column1 text-center">
                                        @if (isset($times_array[2][2])){{ $times_array[2][2] }}@endif
                                    </td>
                                    <td class="column2 text-center">
                                        @if (isset($times_array[2][3])){{ $times_array[2][3] }}@endif
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[2][4])){{ $times_array[2][4] }}@endif
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[2][5])){{ $times_array[2][5] }}@endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column1 text-center">
                                        سه شنبه
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[3][0])){{ $times_array[3][0] }}@endif
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[3][1])){{ $times_array[3][1] }}@endif
                                    </td>
                                    <td class="column1 text-center">
                                        @if (isset($times_array[3][2])){{ $times_array[3][2] }}@endif
                                    </td>
                                    <td class="column2 text-center">
                                        @if (isset($times_array[3][3])){{ $times_array[3][3] }}@endif
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[3][4])){{ $times_array[3][4] }}@endif
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[3][5])){{ $times_array[3][5] }}@endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column1 text-center">
                                        چهارشنبه
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[4][0])){{ $times_array[4][0] }}@endif
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[4][1])){{ $times_array[4][1] }}@endif
                                    </td>
                                    <td class="column1 text-center">
                                        @if (isset($times_array[4][2])){{ $times_array[4][2] }}@endif
                                    </td>
                                    <td class="column2 text-center">
                                        @if (isset($times_array[4][3])){{ $times_array[4][3] }}@endif
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[4][4])){{ $times_array[4][4] }}@endif
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[4][5])){{ $times_array[4][5] }}@endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="column1 text-center">
                                        پنجشنبه
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[5][0])){{ $times_array[5][0] }}@endif
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[5][1])){{ $times_array[5][1] }}@endif
                                    </td>
                                    <td class="column1 text-center">
                                        @if (isset($times_array[5][2])){{ $times_array[5][2] }}@endif
                                    </td>
                                    <td class="column2 text-center">
                                        @if (isset($times_array[5][3])){{ $times_array[5][3] }}@endif
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[5][4])){{ $times_array[5][4] }}@endif
                                    </td>
                                    <td class="column3 text-center">
                                        @if (isset($times_array[5][5])){{ $times_array[5][5] }}@endif
                                    </td>
                                </tr>
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

