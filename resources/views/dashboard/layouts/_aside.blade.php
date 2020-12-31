<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" nav-item"><a href="{{route('dashboard.home')}}"><i class="la la-home"></i><span class="menu-title"
                                                                                              data-i18n="">{{trans('home')}}</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-user-secret"></i><span class="menu-title"
                                                                                     data-i18n="">{{trans('admins')}}</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="la la-user"></i><span class="menu-title"
                                                                             data-i18n="">{{trans('clients')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.categories.index') }}"><i class="la la-book"></i><span class="menu-title"
                                                                             data-i18n="">{{trans('categories')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.products.index') }}"><i class="la la-code-fork"></i><span class="menu-title"
                                                                                  data-i18n="">{{trans('products')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.orders.index') }}"><i class="la la-gift"></i><span class="menu-title"
                                                                             data-i18n="">{{trans('orders')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.subscriptions.index') }}"><i class="la la-ticket"></i><span class="menu-title"
                                                                               data-i18n="">{{trans('subscribes')}}</span></a>
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
            <li class=" nav-item"><a href="{{ route('dashboard.complaint.index') }}"><i class="la la-flag-o"></i><span class="menu-title"
                                                                               data-i18n="">{{trans('complains')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.message.index') }}"><i class="la la-connectdevelop"></i><span class="menu-title"
                                                                                       data-i18n="">{{trans('dashboard.main.messages')}}</span></a>
            </li>
            <li class=" nav-item"><a href=""><i class="la la-facebook"></i><span class="menu-title"
                                                                                 data-i18n="">{{trans('dashboard.settings.Social Links')}}</span></a>
            </li>
            <li class=" nav-item"><a href="{{ route('dashboard.setting.edit') }}">
                    <i class="la la-cogs"></i>
                    <span class="menu-title" data-i18n="">{{trans('settings')}}</span>
                </a>
            </li>

        </ul>
    </div>
</div>
