@extends('web.layouts.app')

@section('content')

    <div class="user-section">
        @include('web.layouts._sidebar')
        <div class="user-info">
            <div class="table-sta table-responsive" style="min-height: 250px">
                @if($orders->count() > 0)
                    <table >
                        <thead>
                        <tr>
                            <th>
                                {{ __('site.Order.Order ID') }}
                            </th>
                            <th>
                                {{ __('site.Order.Product Name') }}
                            </th>
                            <th>
                                {{ __('site.Quantity') }}
                            </th>
                            <th>
                                {{ __('site.Order.Order date') }}
                            </th>
                            <th>
                                {{ __('site.Order.payment method') }}
                            </th>
                            <th>
                                {{ __('site.Order.Price') }}
                            </th>
                            <th>
                                {{ __('dashboard.settings.Delivery price') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            @foreach($order->products as $product)
                                <tr>
                                    <td>
                                        {{$order->id}}
                                    </td>
                                    <td>
                                        {{ $product->name}}

                                    </td>
                                    <td>
                                        {{ $product->pivot->quantity }}
                                    </td>
                                    <td>
                                        {{ $order->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        {{ __("site.$order->payment_method") }}
                                    </td>
                                    <td>
                                        {{ $product->pivot->quantity * $product->price }}

                                    </td>
                                    <td>
                                        @if(isset($setting[ 'delivery_price']))
                                            {{ $setting['delivery_price'] }}
                                        @endif
                                        @if(isset($setting[ app()->getLocale() . '_currency']))
                                            {{ $setting[ app()->getLocale() . '_currency'] }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

    <!--End User-->
    <!--Start Our Meal-->

    @include('web.layouts.our-meals')

    <!--End Our Meal-->


@endsection
