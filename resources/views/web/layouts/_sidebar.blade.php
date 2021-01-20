
    <div class="nav-side-page">
                    <span class="open-nav-side-page">
                        <i class="fas fa-caret-left"></i>
                    </span>
        <span class="top-head-side"></span>
        <img class="logo" src="{{asset('web_files/images/logo.png')}}">
        <ul class="list-unstyled">
            <li class="{{ activeSidebar('users') }}">
                <a href="{{route('users')}}">
                    <i class="fas fa-user"></i>
                    {{ __('site.Profile') }}
                </a>
            </li>
            <li class="{{ activeSidebar('web/user_subscriptions') }}">
                <a href="{{route('user_subscriptions')}}">
                    <i class="fas fa-bread-slice"></i>
                    {{ __('site.Subscriptions') }}
                </a>
            </li>
            <li class="{{ activeSidebar('web/menus') }}">
                <a href="{{route('menus')}}">
                    <i class="fas fa-utensils"></i>
                    {{ __('site.Menu of the week') }}
                </a>
            </li>
            <li class="{{ activeSidebar('web/orders') }}">
                <a href="{{route('orders')}}">
                    <i class="fas fa-box"></i>
                    {{ __('site.Orders') }}
                </a>
            </li>
        </ul>
    </div>
