<nav id="nav-menu-container">
    <ul class="nav-menu text-right">
        <li class="menu-has-children"><a href="">کاربران</a>
            <ul>
                <li><a class="dropdown-item" href="{{ route('user.register') }}">ثبت کاربر جدید</a></li>
                <li><a class="dropdown-item" href="{{ route('user.view') }}">نمایش کاربران</a></li>
            </ul>
        </li>
        <li class="menu-has-children"><a href="">دروس</a>
            <ul>
                <li><a class="dropdown-item" href="{{ route('course.register') }}">ثبت درس</a></li>
                <li><a class="dropdown-item" href="{{ route('course.view') }}">مشاهده دروس</a></li>
            </ul>
        </li>
        <li class="menu-has-children"><a href="">دانشگاه</a>
            <ul>
                <li><a class="dropdown-item" href="{{ route('university.register') }}">ثبت دانشگاه</a></li>
                <li><a class="dropdown-item" href="{{ route('university.view') }}">مشاهده دانشگاه ها</a></li>
            </ul>
        </li>
        <li>
            <a class="nav-link exit" href="{{ route('admin.logout') }}">
                خروج
            </a>
        </li>
    </ul>
</nav>
