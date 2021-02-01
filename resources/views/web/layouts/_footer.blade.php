<!--Start Footer-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="info wow fadeInRight">
                    <div class="logo">
                        @if(isset($setting['logo']))
                            <img src="{{asset('assets/uploads/settings/' . $setting['logo'])}}">
                        @endif
                    </div>
                    <p>
                        @if(isset($setting[app()->getLocale() . '_footer_text']))
                            {!!  $setting[app()->getLocale() . '_footer_text'] !!}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="menu-footer-aa">
                    <ul class="list-unstyled menu-footer wow fadeInDown">
                        <li class="active">
                            <a href="{{route('home')}}">
                                {{__('site.Home')}}
                            </a>
                        </li>
                        @if(auth()->check())
                            <li>
                                <a href="{{route('rate')}}">
                                    {{__('site.Rate.Rate')}}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('products.index')}}">
                                {{__('site.Products')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('who_are_we')}}">
                                {{__('site.Who are we')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('about_us')}}">
                                {{__('site.About us')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('common_questions')}}">
                                {{__('dashboard.main.FAQ')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('terms')}}">
                                {{__('site.Policies')}}
                            </a>
                        </li>
                        @if(auth()->check())
                            <li>
                                <a href="{{route('contact_us')}}">
                                    {{__('site.Contact us')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{route('complaints')}}">
                                    {{__('site.Complaints')}}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('site.Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-form">
                    <div class="info-form-aa">
                        <form action="{{ route('join-us') }}" class="wow fadeInLeft" method="post">
                            @csrf
                            <input type="email" placeholder="{{ __('site.Enter your email address') }}" name="email">
                            <input type="submit" value="{{ __('site.join us') }}">
                        </form>
                        <div class="media-links">
                            @if(isset($setting['social_snapchat']))
                                <a href="{{$setting['social_snapchat']}}" class="snapchat wow fadeInDown"
                                   data-wow-delay=".1s">
                                    <i class="fab fa-snapchat-ghost"></i>
                                </a>
                            @endif

                            @if(isset($setting['social_linkedin']))
                                <a href="{{$setting['social_linkedin']}}" class="linkedin wow fadeInDown"
                                   data-wow-delay=".2s">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            @endif
                            @if(isset($setting['social_instagram']))
                                <a href="{{$setting['social_instagram']}}" class="instagram wow fadeInDown"
                                   data-wow-delay=".3s">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                            @if(isset($setting['social_twitter']))
                                <a href="{{$setting['social_twitter']}}" class="twitter wow fadeInDown"
                                   data-wow-delay=".4s">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif
                            @if(isset($setting['social_facebook']))
                                <a href="{{$setting['social_facebook']}}" class="facebook wow fadeInDown"
                                   data-wow-delay=".5s">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            @if(isset($setting['social_whatsapp']))
                                <a href="tel:{{$setting['social_whatsapp']}}" class="whatsapp wow fadeInDown"
                                   data-wow-delay=".6s">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container">
        <p>
            @if(isset($setting[app()->getLocale() . '_rights']))
                {!!  $setting[app()->getLocale() . '_rights'] !!}
            @endif
        </p>
    </div>
</div>
<!--End Footer-->
