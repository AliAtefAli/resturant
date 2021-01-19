@extends('web.layouts.app')

@section('content')

    <div class="user-section">
        @include('web.layouts._sidebar')
        <div class="user-info">
            <div class="table-sta table-responsive" style="min-height: 250px">
                <table style="min-height: 1150px;">
                    <thead>
                    <tr>
                        <th>
                            {{ __('site.Order.Order ID') }}
                        </th>
                        <th>
                            {{ __('site.Order.Product Name') }}
                        </th>
                        <th>
                            {{ __('site.People count') }}
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
                        <tr>
                            <td>
                                {{$order->id}}
                            </td>
                            <td>
                                {{$order->products->name}}
                            </td>
                            <td>
                                2
                            </td>
                            <td>
                                23/7/2543
                            </td>
                            <td>
                                كاش
                            </td>
                            <td>
                                سعر الباقة
                            </td>
                            <td>
                                سعر التوصيل
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--End User-->
    <!--Start Our Meal-->

    @include('web.layouts.our-meals')

    <!--End Our Meal-->


@endsection
