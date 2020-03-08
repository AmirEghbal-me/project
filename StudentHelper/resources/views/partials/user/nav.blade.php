<nav id="nav-menu-container">
    <ul class="nav-menu">
        <li class="menu-has-children"><a href="">انتخاب واحد</a>
            <ul>
                <li><a href="{{ route('selectUnit') }}">ثبت درس</a></li>
                <li><a href="{{ route('selectUnitView') }}">(مشاهده/حذف/ثبت نمره) درس های انتخاب شده</a></li>
                <li><a href="{{ route('course.weeks_time') }}">مشاهده جدول هفتگی</a></li>
            </ul>
        </li>
        <li class="menu-has-children"><a href="">پایان ترم</a>
            <ul>
                <li><a href="{{ Route('enter.grades') }}">ورود نمره(تخمین دانشجو)</a></li>
            </ul>
        </li>
        <li><a class="exit" href="{{ route('user.logout') }}">خروج</a></li>
    </ul>
</nav>
