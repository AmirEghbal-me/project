@extends('admin.dashboard.frame')
@section('nav')
    @include('partials/admin/nav')
@endsection
@section('banner')
    <h1 class="text-white">
        ثبت کاربر جدید
    </h1>
    <p class="text-white link-nav"><a href="/admin/dashboard">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/admin/userRegister"> userRegister</a></p>
    @endsection
@section('contents')
    <div class="content">
        <div class="universityData">
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100">
                            <form action = "{{ Route('post.Register') }}" method = "post">
                                {{ csrf_field() }}
                                <table>
                                    <thead>
                                    <tr class="table100-head">
                                        <th class="column3 text-center">نام </th>
                                        <td class="column3 text-center">نام خانوادگی</td>
                                        <td class="column3 text-center">ایمیل</td>
                                        <td class="column3 text-center">شماره تلفن</td>
                                        <td class="column3 text-center">رمز عبور</td>
                                        <td class="column3 text-center">نوع کاربر</td>
                                        <td class="column3 text-center">دانشگاه</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="column3 text-center">
                                            <input type='text' name='name' placeholder="name:..." />
                                        </td>
                                        <td class="column3 text-center">
                                            <input type="text" name='family' placeholder="family..."/>
                                        </td>
                                        <td class="column3 text-center">
                                            <input type="text" name='email' placeholder="email..."/>
                                        </td>
                                        <td class="column3 text-center">
                                            <input type="text" name='phone_number' placeholder="phone..."/>
                                        </td>
                                        <td class="column3 text-center">
                                            <input type="text" name='password' placeholder="password..."/>
                                        </td>
                                        <td class="column3 text-center">
                                            <select name="role" id="role" onchange="university()">
                                                <option value="3">دانشجو</option>
                                                <option value="2">استاد</option>
                                                <option value="1">ادمین</option>
                                            </select>
                                        </td>
                                        <td class="column3 text-center">
                                            <select name="university_id">
                                                @foreach($universities as $value)
                                                    <option value="{{ $value->university_id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>

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
    </div>
    <script>
        function university() {
            if (document.getElementById('role').value != 1){
                document.getElementById('universities').style.visibility = "visible";
            }
            else {
                document.getElementById('universities').style.visibility = "hidden";
            }
        }
    </script>
@endsection


