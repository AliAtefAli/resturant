<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                        class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                            class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img class="brand-logo" alt="modern admin logo"
                             src="@if(isset($setting['logo'])) {{asset('assets/uploads/settings/' . $setting['logo'] )}} @else {{ asset('dashboard_files/app-assets/images/ico/favicon.ico') }} @endif">
                        <h3 class="brand-text">@if(isset($setting[ lang() . '_name'])){{ $setting[lang() . '_name'] }} @else Dashboard @endif</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                            class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false"><i
                                class="flag-icon @if(lang() == 'ar' ) flag-icon-eg @else flag-icon-gb @endif"></i><span
                                class="selected-language"></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item" href="{{route('dashboard.change.language')}}"><i
                                    class="flag-icon @if(lang() == 'ar' ) flag-icon-gb @else flag-icon-eg @endif"></i>{{lang_str()}}
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
