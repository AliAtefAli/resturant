<!--Start Loading-->
<div class="loading">
    <div>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
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
                <a href="{{route('products')}}">
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
        <a href="#">
            <i class="fas fa-user"></i>
        </a>
        <a href="#">
            <i class="fas fa-utensils"></i>
        </a>
        <a href="#">
            <i class="fas fa-shopping-cart"></i>
        </a>
        <a href="#">
            <i class="fas fa-heart"></i>
        </a>
        <a href="#">
            <i class="fas fa-bell"></i>
        </a>
    </div>
</div>
<!--End Small Screen-->

<!--Start Top-->
<div class="top-page">
    <div class="container">
        <div class="top-page-links">
            <a class="top-page-link" href="{{route('login')}}">
                {{ trans('site.Login') }}
            </a>
            <a class="top-page-link" href="{{route('register')}}">
                {{ __('site.Register') }}
            </a>
            <div class="drop-lang">
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
                <div class="col-3 col-lg-3">
                    <a class="logo" href="#">
                        <img src="{{asset('web_files/images/logo.png')}}">
                    </a>
                </div>
                <div class="col-9 col-lg-5">
                    <ul class="list-unstyled menus-menu">
                        <li class="active">
                            <a href="{{route('home')}}">
                                {{ __('site.Home') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('products')}}">
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
                        <a href="{{route('users')}}" title="{{ __('site.Profile') }}">
                            <i class="fas fa-user" ></i>
                        </a>
                        <a href="{{route('products')}}" title="{{ __('site.Products') }}">
                            <i class="fas fa-utensils"></i>
                        </a>
                        <a href="{{route('carts')}}" title="{{ __('site.Cart') }}">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                        <a href="#" title="{{ __('site.Favorites') }}">
                            <i class="fas fa-heart" ></i>
                        </a>
                        <a href="#" title="{{__('site.Notification')}}">
                            <i class="fas fa-bell" ></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Nav-->
