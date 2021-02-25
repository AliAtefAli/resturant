<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a href="{{route('dashboard.home')}}"><i class="la la-home"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.main.home')}}</span></a>
            </li>

           @if(auth()->user()->permissions == 'admin')
            <li class=" nav-item"><a href="{{ route('dashboard.users.admins') }}"><i class="fa fa-users-cog"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.user.admins')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.users.index') }}"><i class="la la-users"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.main.Users')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.meals.index') }}"><i class="la la-users"></i><span
                            class="menu-title"
                            data-i18n="">{{trans('dashboard.our_meals')}}</span></a>
            </li>

{{--            <li class=" nav-item"><a href="{{ route('dashboard.categories.index') }}"><i class="la la-book"></i><span--}}
{{--                        class="menu-title"--}}
{{--                        data-i18n="">{{trans('dashboard.category.Categories')}}</span></a>--}}
{{--            </li>--}}
{{--            <li class=" nav-item"><a href="{{ route('dashboard.products.index') }}"><i class="la la-code-fork"></i><span--}}
{{--                        class="menu-title"--}}
{{--                        data-i18n="">{{trans('dashboard.main.products')}}</span></a>--}}

            <li class=" nav-item"><a href="{{ route('dashboard.discounts.index') }}"><i class="la la-gift"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.discounts.discounts')}}</span></a>
            <li class=" nav-item">
            <li class=" nav-item"><a href="{{ route('dashboard.news.letter') }}"><i class="la la-newspaper-o"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.News Letter.News Letter')}}</span></a>
            @endif
{{--            <li class=" nav-item">--}}
{{--                <a href="#">--}}
{{--                    <i class="la la-tags"></i>--}}
{{--                    <span class="menu-title" data-i18n="">{{trans('dashboard.main.orders')}}</span>--}}
{{--                    <ul class="menu-content">--}}
{{--                        <li>--}}
{{--                            <a class="menu-item" href="{{ route('dashboard.ordersOfToday') }}" data-i18n="nav.page_layouts.1_column">--}}
{{--                                {{ trans('dashboard.order.Today Orders') }}--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li>--}}
{{--                            <a class="menu-item" href="{{ route('dashboard.orders.index') }}"--}}
{{--                               data-i18n="nav.page_layouts.2_columns">--}}
{{--                                {{ trans('dashboard.order.All orders') }}--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

{{--                </a>--}}
{{--            </li>--}}


            <li class=" nav-item">
                <a href="#">
                    <i class="la la-ticket"></i>
                    <span class="menu-title" data-i18n="">{{trans('dashboard.subscriptions.Subscriptions')}}</span>

                        <ul class="menu-content">
                            @if(auth()->user()->permissions == 'admin')
                            <li>
                                <a class="menu-item" href="{{ route('dashboard.subscriptions.index') }}"
                                   data-i18n="nav.page_layouts.1_column">
                                    {{ trans('dashboard.subscriptions.Show Subscriptions') }}
                                </a>
                            </li>
                            @endif

                            @if(auth()->user()->permissions == 'admin' || auth()->user()->permissions == 'chef' || auth()->user()->permissions == 'delivery')
                                <li>
                                    <a class="menu-item"
                                       href="{{ route('dashboard.subscriptions.tomorrowSubscription') }}"
                                       data-i18n="nav.page_layouts.1_column">
                                        {{ trans('dashboard.subscriptions.tomorrow_subscriptions') }}
                                        <span class="badge badge badge-danger badge-pill float-right ">{{ (auth()->user()) ? (auth()->user()->unreadNotifications()->where('type', 'App\Notifications\TomorrowSubscriptions')->count()) : 0 }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="menu-item" href="{{ route('dashboard.subscriptions.todaySubscription') }}"
                                       data-i18n="nav.page_layouts.1_column">
                                        {{ trans('dashboard.subscriptions.today_subscriptions') }}
                                        <span class="badge badge badge-danger badge-pill float-right ">{{ (auth()->user()) ? (auth()->user()->unreadNotifications()->where('type', 'App\Notifications\TodaySubscriptions')->count()) : 0 }}</span>
                                    </a>
                                </li>
                        @endif
                            @if(auth()->user()->permissions == 'admin')
                                <li>
                                    <a class="menu-item" href="{{ route('dashboard.subscriptions.allSubscriptions') }}"
                                       data-i18n="nav.page_layouts.2_columns">
                                        {{ trans('dashboard.subscriptions.All Subscriptions') }}
                                        <span class="badge badge badge-danger badge-pill float-right">{{ (auth()->user()) ? (auth()->user()->unreadNotifications()->where('type', 'App\Notifications\NewSubscriptions')->count()) : 0 }}</span>
                                    </a>
                                </li>

                                <li>
                                    <a class="menu-item"
                                       href="{{ route('dashboard.subscriptions.finishedSubscriptions') }}"
                                       data-i18n="nav.page_layouts.1_column">
                                        {{ trans('dashboard.subscriptions.Finished Subscriptions') }}
                                        <span class="badge badge badge-danger badge-pill float-right ">{{ (auth()->user()) ? (auth()->user()->unreadNotifications()->where('type', 'App\Notifications\FinishedSubscriptions')->count()) : 0 }}</span>
                                    </a>
                                </li>

                                <li>
                                    <a class="menu-item"
                                       href="{{ route('dashboard.subscriptions.stoppedSubscriptions') }}"
                                       data-i18n="nav.page_layouts.1_column">
                                        {{ trans('dashboard.subscriptions.stopped_subscriptions') }}
                                        <span class="badge badge badge-danger badge-pill float-right">{{ (auth()->user()) ? (auth()->user()->unreadNotifications()->where('type', 'App\Notifications\StoppedSubscriptions')->count()) : 0 }}</span>
                                    </a>
                                </li>
                            @endif

                    </ul>

                </a>
            </li>

            @if(auth()->user()->permissions == 'admin')
            <li class=" nav-item"><a href="{{ route('dashboard.rates.index') }}"><i class="la la-star-o"></i><span class="menu-title"
                                                                               data-i18n="">{{trans('dashboard.main.rates')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.complaint.index') }}"><i
                        class="ft-alert-circle"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.main.complaints')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.message.index') }}"><i
                        class="ft-mail"></i><span class="menu-title"
                                                            data-i18n="">{{trans('dashboard.main.Inbox')}}</span></a>
            </li>

            <li class=" nav-item"><a href="{{ route('dashboard.transactions.index') }}"><i
                        class="la la-money"></i><span class="menu-title"
                                                   data-i18n="">{{trans('dashboard.Transactions.Transactions')}}</span></a>
            </li>
            @endif
            <li class=" nav-item"><a href="#"><i class="la la-cogs"></i>
                    <span class="menu-title"
                          data-i18n="nav.page_layouts.main">{{ trans('dashboard.main.Settings') }}</span></a>
                <ul class="menu-content">
                    @if(auth()->user()->permissions == 'admin')
                    <li>
                        <a class="menu-item" href="{{ route('dashboard.settings.general') }}"
                           data-i18n="nav.page_layouts.2_columns">
                            {{ trans('dashboard.settings.General Settings') }}
                        </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.sliders.index') }}"
                           data-i18n="nav.page_layouts.2_columns">
                            {{ trans('dashboard.main.Sliders') }}
                        </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.questions.index') }}"
                           data-i18n="nav.page_layouts.2_columns">
                            {{ trans('dashboard.main.FAQ') }}
                        </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.settings.social') }}"
                           data-i18n="nav.page_layouts.2_columns">
                            {{ trans('dashboard.settings.Social Links') }}
                        </a>
                    </li>

                    <li><a class="menu-item" href="{{ route('dashboard.settings.api') }}"
                           data-i18n="nav.page_layouts.2_columns">
                            {{ trans('dashboard.API.APIs') }}
                        </a>
                    </li>
                    @endif
                        @if(auth()->user()->permissions == 'admin' || auth()->user()->permissions == 'chef' || auth()->user()->permissions == 'delivery')
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('dashboard.Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endif
                </ul>
            </li>

        </ul>
    </div>
</div>
