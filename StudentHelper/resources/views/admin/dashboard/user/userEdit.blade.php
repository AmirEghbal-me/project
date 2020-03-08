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
@extends('admin.dashboard.frame')
@section('nav')
    @include('partials/admin/nav')
@endsection
@section('banner')
    <h1 class="text-white">
        ویرایش کاربر
    </h1>
    <p class="text-white link-nav"><a href="/admin/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>  userEdit</p>
@endsection
@section('contents')
    <div class="content">
        <div class="universityData">
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100">
                            <form action = "" method = "post">
                                {{ csrf_field() }}
                                <table>
                                    <thead>
                                    <tr class="table100-head">
                                        <th class="column3 text-center">نام </th>
                                        <td class="column3 text-center">نام خانوادگی</td>
                                        <td class="column3 text-center">ایمیل</td>
                                        <td class="column3 text-center">شماره تلفن</td>
                                        <td class="column3 text-center">رمز عبور</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="column3 text-center">
                                            <input type='text' name='name' value="{{ old('name',isset($userItem) ? $userItem->name: '') }}"/>
                                        </td>
                                        <td class="column3 text-center">
                                            <input type="text" name='family' value="{{ old('name',isset($userItem) ? $userItem->family: '') }}"/>
                                        </td>
                                        <td class="column3 text-center">
                                            <input type="text" name='email' value="{{ old('name',isset($userItem) ? $userItem->email: '') }}"/>
                                        </td>
                                        <td class="column3 text-center">
                                            <input type="text" name='phone_number' value="{{ old('name',isset($userItem) ? $userItem->phone_number: '') }}"/>
                                        </td>
                                        <td class="column3 text-center">
                                            <input type="text" name='password' placeholder="password..."/>
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
