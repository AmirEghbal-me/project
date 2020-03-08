@extends('admin.dashboard.frame')
@section('nav')
    @include('partials/admin/nav')
@endsection
@section('banner')
    <h1 class="text-white">
        ثبت دانشگاه
    </h1>
    <p class="text-white link-nav"><a href="/admin/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/admin/universityRegister"> universityRegister</a></p>
@endsection
@section('contents')
    <div class="content">
        <div class="universityData">
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100">
                            <form action = "{{ route('university.post.Register') }}" method = "post">
                                {{ csrf_field() }}
                                <table>
                                    <thead>
                                    <tr class="table100-head">
                                        <th class="column1 text-center">نام</th>
                                        <td class="column3 text-center">آدرس</td>
                                        <td class="column3 text-center">نشانی اینترنتی</td>
                                        <td class="column1 text-center">شماره تلفن</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="column1 text-center"><input class="user_register" type='text' name='name' placeholder="name..." /></td>
                                            <td class="column3 text-center"><input class="user_register" type="text" name='address' placeholder="address..."/></td>
                                            <td class="column3 text-center"><input class="user_register" type="text" name='url' placeholder="url..."/></td>
                                            <td class="column1 text-center"><input class="user_register" type="text" name='phone_number' placeholder="phone_number..."/></td>
                                        </tr>
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
@endsection
