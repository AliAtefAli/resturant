
    <div class="nav-side-page">
                    <span class="open-nav-side-page">
                        <i class="fas fa-caret-left"></i>
                    </span>
        <span class="top-head-side"></span>
        <img class="logo" src="{{asset('web_files/images/logo.png')}}">
        <ul class="list-unstyled">
{{--            <li class="@if(Request::is('web/users/') || Request::is('web/users/*')) active @endif">--}}
            <li class="{{ activeSidebar('users') }}">
                <a href="{{route('web.users')}}">
                    <i class="fas fa-user"></i>
                    البيانات الشخصية
                </a>
            </li>
            <li class="{{ activeSidebar('web/user_subscriptions') }}">
                <a href="{{route('web.user_subscriptions')}}">
                    <i class="fas fa-bread-slice"></i>
                    باقاتي
                </a>
            </li>
            <li class="{{ activeSidebar('web/menus') }}">
                <a href="{{route('web.menus')}}">
                    <i class="fas fa-utensils"></i>
                    المنيو الاسبوعى
                </a>
            </li>
            <li class="{{ activeSidebar('web/orders') }}">
                <a href="{{route('web.orders')}}">
                    <i class="fas fa-box"></i>
                    الطلبات
                </a>
            </li>
        </ul>
    </div>
