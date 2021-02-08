<!--Start Loading-->
{{--<div class="loading">--}}
{{--    <div>--}}
{{--        <span></span>--}}
{{--        <span></span>--}}
{{--        <span></span>--}}
{{--        <span></span>--}}
{{--    </div>--}}
{{--</div>--}}
<!--End Loading-->

<!--Start Small Screen-->
<div class="small-screen">
    <div class="menu">
        <div class="close-ss">
            <i class="fas fa-times"></i>
        </div>
        <ul class="list-unstyled menus-menu">
            <li class="active">
                <a href="{{route('home')}}">
                    {{ trans('site.Home') }}
                </a>
            </li>
            <li>
                <a href="{{route('categories.index')}}">
                    {{ __('site.Categories') }}
                </a>
            </li>
            <li>
                <a href="{{route('products.index')}}">
                    {{ __('site.Products') }}
                </a>
            </li>
            <li>
                <a href="{{route('who_are_we')}}">
                    {{ __('site.Who are we') }}
                </a>
            </li>
            <li>
                <a href="{{route('contact_us')}}">
                    {{ __('site.Contact us') }}
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="icons-action-section">
                <span class="open-icon">
                    <i class="fas fa-caret-right"></i>
                </span>
    <div class="icons-action">
        @if(auth()->check())
            <a href="{{ route('users') }}">
                <i class="fas fa-user"></i>
            </a>
        @endif
        <a href="{{ route('products.index') }}">
            <i class="fas fa-utensils"></i>
        </a>

        <a href="{{ route('carts') }}">
            <i class="fas fa-shopping-cart"> <span style="color: #CC5641;" id="cart-quantity">
             <span style="color: #CC5641;"> {{ Cart::instance('cart')->count() }} </span>
            </span></i>

        </a>
        <a href="{{ route('users.fav') }}">
            <i class="fas fa-heart"></i>
        </a>
        @if(auth()->check())
            <a href="{{ route('user.notification')  }}" title="{{__('site.Notification')}}">
                <i class="fas fa-bell"><span
                        style="color: #CC5641;"> {{ (auth()->user()) ? (auth()->user()->unreadNotifications()->count()) : 0 }} </span></i>
            </a>
        @endif
    </div>
</div>
<!--End Small Screen-->

<!--Start Top-->
<div class="top-page">
    <div class="container">
        <div class="top-page-links">
            @auth
                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('site.Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <a class="top-page-link" href="{{route('login')}}" style="top: 8px;">
                    {{ trans('site.Login') }}
                </a>
                <a class="top-page-link" href="{{route('register')}}" style="top: 8px;">
                    {{ __('site.Register') }}
                </a>
            @endauth
            <div class="drop-lang" style="top: 8px;">
                            <span>
                                 @if(lang() == 'ar') العربية @else  English @endif
                            </span>
                    <div class="sub-menu">
                        <a href="{{route('change.language')}}" class="top-page-link">
                            @if(lang() == 'ar') English @else العربية  @endif
                        </a>
                    </div>
                </div>
        </div>
    </div>
</div>
<!--End Top-->

<!--Start Nav-->
<div class="nav-section">
    <img class="shep" src="{{asset('web_files/images/jj.png')}}">
    <div class="container">
        <div class="nav-aa">
            <div class="row">
                <div class="col-2 col-lg-2">
                    <a class="logo" href="{{route('home')}}">
                        @if(isset($setting['logo']))
                            <img lazy="loading" src="{{asset('assets/uploads/settings/' . $setting['logo'])}}">
                        @endif
                    </a>
                </div>
                <div class="col-10 col-lg-6" @if(lang() == 'ar')style="padding-right: 100px" @else style="padding-left: 115px; padding-right: 1px"  @endif>
                    <ul class="list-unstyled menus-menu">
                        <li class="active">
                            <a href="{{route('home')}}">
                                {{ __('site.Home') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('categories.index')}}">
                                {{ __('site.Categories') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('products.index')}}">
                                {{ __('site.Products') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('who_are_we')}}">
                                {{__('site.Who are we')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('contact_us')}}">
                                {{ __('site.Contact us') }}
                            </a>
                        </li>
                    </ul>
                    <span class="open-small-menu">
                                    <i class="fas fa-bars"></i>
                                </span>
                </div>
                <div class="col-lg-4">
                    <div class="icons-action">
{{--                        @if(auth()->check())--}}
                            <a href="{{route('users')}}" title="{{ __('site.Profile') }}">
                                <i class="fas fa-user"></i>
                            </a>
                            <a href="{{route('carts')}}" title="{{ __('site.Cart') }}">
                                <i class="fas fa-shopping-cart">
                                    <span style="color: #CC5641;"> {{ Cart::instance('cart')->count() }} </span>
                                </i>
                            </a>
                            <a href="{{route('users.fav')}}" title="{{ __('site.Favorites') }}">
                                <i class="fas fa-heart">
                                    <span style="color: #CC5641;"> {{auth()->user() ? auth()->user()->favorites->count() : '' }} </span>
                                </i>
                            </a>
                            <a href="{{ route('user.notification')  }}" title="{{__('site.Notification')}}">
                                <i class="fas fa-bell"><span
                                        style="color: #CC5641;"> {{ (auth()->user()) ? (auth()->user()->unreadNotifications()->where('type', '!=', 'App\Notifications\NewOrderNotification')->count()) : 0 }} </span></i>
                            </a>
                            <a href="{{route('products.index')}}" title="{{ __('site.Products') }}">
                                <i class="fas fa-utensils"></i>
                            </a>
{{--                        @endif--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Nav-->
