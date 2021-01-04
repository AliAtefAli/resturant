<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a href="{{route('dashboard.home')}}"><i class="la la-home"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('home')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.users.index') }}"><i class="la la-users"></i><span class="menu-title"
                                                                             data-i18n="">{{trans('dashboard.main.Users')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.categories.index') }}"><i class="la la-book"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('categories')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.products.index') }}"><i class="la la-code-fork"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.product.products')}}</span></a>

            <li class=" nav-item"><a href="{{ route('dashboard.discounts.index') }}"><i class="la la-gift"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('dashboard.discounts.discounts')}}</span></a>
            <li class=" nav-item"><a href="{{ route('dashboard.orders.index') }}"><i class="la la-tags"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('orders')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.subscriptions.index') }}"><i
                        class="la la-ticket"></i><span class="menu-title"
                                                       data-i18n="">{{trans('subscriptions')}}</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="la la-black-tie"></i><span class="menu-title"
                                                                                  data-i18n="">{{trans('subscribed_clients')}}</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="la la-file"></i><span class="menu-title"
                                                                             data-i18n="">{{trans('reports')}}</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="la la-star-o"></i><span class="menu-title"
                                                                               data-i18n="">{{trans('rates')}}</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="la la-question"></i><span class="menu-title"
                                                                                 data-i18n="">{{trans('common_questions')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.complaint.index') }}"><i class="la la-flag-o"></i><span
                        class="menu-title"
                        data-i18n="">{{trans('complains')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.message.index') }}"><i
                        class="la la-connectdevelop"></i><span class="menu-title"
                                                               data-i18n="">{{trans('dashboard.main.messages')}}</span></a>
            </li>

            <li class=" nav-item"><a href="#"><i class="la la-cogs"></i>
                    <span class="menu-title"
                          data-i18n="nav.page_layouts.main">{{ trans('dashboard.main.Settings') }}</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="layout-1-column.html" data-i18n="nav.page_layouts.1_column">
                            {{ trans('dashboard.settings.Social Links') }}
                        </a>
                    </li>

                    <li>
                        <a class="menu-item" href="{{ route('dashboard.setting.general') }}" data-i18n="nav.page_layouts.2_columns">
                            {{ trans('dashboard.settings.General Settings') }}
                        </a>
                    </li>
                    <li><a class="menu-item" href="layout-2-columns.html" data-i18n="nav.page_layouts.2_columns">
                            {{ trans('dashboard.main.Sliders') }}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
