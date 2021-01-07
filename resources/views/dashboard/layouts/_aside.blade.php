<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a href="{{route('dashboard.home')}}"><i class="la la-home"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.main.home')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.users.index') }}"><i class="la la-users"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.main.Users')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.categories.index') }}"><i class="la la-book"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.category.Categories')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.products.index') }}"><i class="la la-code-fork"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.main.products')}}</span></a>

            <li class=" nav-item"><a href="{{ route('dashboard.discounts.index') }}"><i class="la la-gift"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.discounts.discounts')}}</span></a>
            <li class=" nav-item">
                <a href="#">
                    <i class="la la-tags"></i>
                    <span class="menu-title" data-i18n="">{{trans('dashboard.main.orders')}}</span>
                    <ul class="menu-content">
                        <li>
                            <a class="menu-item" href="{{ route('dashboard.ordersOfToday') }}" data-i18n="nav.page_layouts.1_column">
                                {{ trans('dashboard.order.Today Orders') }}
                            </a>
                        </li>

                        <li>
                            <a class="menu-item" href="{{ route('dashboard.orders.index') }}"
                               data-i18n="nav.page_layouts.2_columns">
                                {{ trans('dashboard.order.All orders') }}
                            </a>
                        </li>
                    </ul>

                </a>
            </li>

            <li class=" nav-item"><a href="{{ route('dashboard.subscriptions.index') }}"><i
                        class="la la-ticket"></i><span class="menu-title"
                                                       data-i18n="">{{trans('dashboard.subscriptions.Subscriptions')}}</span></a>
            </li>

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



            <li class=" nav-item"><a href="#"><i class="la la-cogs"></i>
                    <span class="menu-title"
                          data-i18n="nav.page_layouts.main">{{ trans('dashboard.main.Settings') }}</span></a>
                <ul class="menu-content">
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

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
