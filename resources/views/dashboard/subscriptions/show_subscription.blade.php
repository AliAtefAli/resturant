<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{trans('dashboard.order.order_invioce')}}</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <style type="text/css">
        body {
            text-align: center;
            margin: 0 auto;
            width: 650px;
            font-family: 'Open Sans', sans-serif;
            background-color: #e2e2e2;
            display: block;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            text-decoration: unset;
        }

        a {
            text-decoration: none;
        }

        p {
            margin: 15px 0;
        }

        h5 {
            color: #444;
            text-align: left;
            font-weight: 400;
        }

        .text-center {
            text-align: center
        }

        .main-bg-light {
            background-color: #fafafa;
        }

        .title {
            color: #444444;
            font-size: 22px;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 0;
            text-transform: uppercase;
            display: inline-block;
            line-height: 1;
        }

        table {
            margin-top: 30px
        }

        table.top-0 {
            margin-top: 0;
        }

        table.order-detail {
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        table.order-detail tr:nth-child(even) {
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }

        table.order-detail tr:nth-child(odd) {
            border-bottom: 1px solid #ddd;
        }

        .pad-left-right-space {
            border: unset !important;
        }

        .pad-left-right-space td {
            padding: 5px 15px;
        }

        .pad-left-right-space td p {
            margin: 0;
        }

        .pad-left-right-space td b {
            font-size: 15px;
            font-family: 'Roboto', sans-serif;
        }

        .order-detail th {
            font-size: 16px;
            padding: 15px;
            text-align: center;
            background: #fafafa;
        }

        .footer-social-icon tr td img {
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
</head>

<body style="margin: 20px auto;">
<table align="center" border="0" cellpadding="0" cellspacing="0"
       style="padding: 0 30px;background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);width: 100%;">
    <tbody>
    <tr>
        <td>
            <table align="left" border="0" cellpadding="0" cellspacing="0" style="text-align: left;"
                   width="100%">
                <tr>
                    <td style="text-align: center;">
                        <img src="../assets/images/email-temp/delivery-2.png" alt=""
                             style=";margin-bottom: 30px;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="font-size: 14px;"><b>{{trans('dashboard.hi')}}, {{ $subscriptionUser->user->name }}</b></p>
                        <p style="font-size: 14px;">{{ trans('dashboard.order.Order Is Successfully Processed And Your Order Is On The Way,') }}</p>
                        <p style="font-size: 14px;">{{ trans('dashboard.Transactions.Transaction id') }} : {{ $subscriptionUser->id }}</p>
                    </td>
                </tr>
            </table>

            <table cellpadding="0" cellspacing="0" border="0" align="left"
                   style="width: 100%;margin-top: 10px;    margin-bottom: 10px;">
                <tbody>
                <tr>
                    <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 50%;">
                        <h5 style="text-align: center;font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">{{ trans('dashboard.order.phone') }}</h5>
                        <p style="text-align: center;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">{{ auth()->user()->phone }}</p>
                    </td>
                    <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 50%;">
                        <h5 style="text-align: center;font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">{{ trans('dashboard.additional_phone') }}</h5>
                        @if($subscriptionUser->billing_phone == null)
                            <p style="text-align: center;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">{{ trans('dashboard.there_is_no_additional_mobile') }}</p>
                        @else
                            <p style="text-align: center;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">{{ $subscriptionUser->billing_phone }}</p>
                        @endif

                    </td>

                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" border="0" align="left"
                   style="width: 100%;margin-top: 10px;    margin-bottom: 10px;">
                <tbody>
                <tr>
                    <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 50%;">
                        <h5 style="text-align: center; font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">{{ trans('dashboard.order.Your Shipping Address') }}</h5>
                        <p style=" text-align: center;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">{{ $subscriptionUser->billing_address }}</p>
                    </td>

                </tr>
                </tbody>
            </table>

            <table cellpadding="0" cellspacing="0" border="0" align="left"
                   style="width: 100%;margin-top: 10px;    margin-bottom: 10px;">
                <tbody>
                <tr>
                    <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 25%;">
                        <h5 style="text-align: center; font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">{{ trans('dashboard.order.Product images') }}</h5>
                            <img src="{{ asset('assets/uploads/subscriptions/' . $subscriptionUser->subscription->image ) }}"
                                 alt="" width="80">
                        {{--                                <p style=" text-align: center;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px;    margin-top: 0;">{{ $order->billing_address }}</p>--}}
                    </td>
                    <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 25%;">
                        <h5 style="text-align: center; font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">{{ trans('dashboard.order.Product Name') }}</h5>
                            <p style=" text-align: center;font-weight: normal; font-size: 14px; color: #000000; margin-top: 0;height: 81px;margin-bottom: 0;line-height: 81px">{{ $subscriptionUser->subscription->name }}</p>
                    </td>
                    <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 25%;">
                        <h5 style="text-align: center; font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">{{ trans('site.Order.Quantity') }}</h5>
                            <p style=" text-align: center;font-weight: normal; font-size: 14px; color: #000000; margin-top: 0;height: 81px;margin-bottom: 0;line-height: 81px">{{ $subscriptionUser->people_count }}</p>
                    </td>
                    <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 25%;">
                        <h5 style="text-align: center; font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">{{ trans('site.Order.Price') }}</h5>
                            <p style=" text-align: center;font-weight: normal; font-size: 14px; color: #000000; margin-top: 0;height: 81px;margin-bottom: 0;line-height: 81px">{{ $subscriptionUser->subscription->price }}</p>
                    </td>

                </tr>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" border="0" align="left"
                   style="width: 100%;margin-top: 10px;    margin-bottom: 10px;">
                <tbody>
                <tr>
                    <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 25%;">
                        <h5 style="text-align: center; font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">{{ trans('dashboard.subscriptions.Shipping type') }}</h5>
                        <p style=" text-align: center;font-weight: normal; font-size: 14px; color: #000000; margin-top: 0;height: 81px;margin-bottom: 0;line-height: 81px">{{trans('dashboard.subscriptions.' . $subscriptionUser->shipping_type )}}</p>
                    </td>
                    <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 25%;">
                        <h5 style="text-align: center; font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 13px;">{{ trans('dashboard.subscriptions.People count') }}</h5>
                        <p style=" text-align: center;font-weight: normal; font-size: 14px; color: #000000; margin-top: 0;height: 81px;margin-bottom: 0;line-height: 81px">{{ $subscriptionUser->people_count }}</p>
                    </td>
                    <td style="background-color: #fafafa;border: 1px solid #ddd;padding: 15px;letter-spacing: 0.3px;width: 25%;">
                        <h5 style="text-align: center; font-size: 16px; font-weight: 600;color: #000; line-height: 16px; padding-bottom: 10px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top:0; margin-bottom: 43px;">{{ trans('dashboard.subscriptions.Note') }}</h5>
                        @if($subscriptionUser->note == null)
                            <p style="text-align: center;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px; margin-bottom: 32px;word-break:break-all;word-wrap:break-word;">{{ trans('dashboard.there_is_no_note') }}</p>
                        @else
                            <p style="text-align: center;font-weight: normal; font-size: 14px; color: #000000;line-height: 21px; margin-bottom: 32px;word-break:break-all;word-wrap:break-word;">{{ $subscriptionUser->note }}</p>
                        @endif
                    </td>

                </tr>
                </tbody>
            </table>
            <table class="order-detail" border="0" cellpadding="0" cellspacing="0" align="left"
                   style="width: 100%;    margin-bottom: 50px;">
                <tr class="pad-left-right-space">
                    <td colspan="2" align="left">
                        <p style="font-size: 14px;">{{ trans('dashboard.order.payment method') }} :</p>
                    </td>
                    <td colspan="2" align="right">
                        <b> {{ __("dashboard.order.$subscriptionUser->payment_type") }}</b>
                    </td>
                </tr>
                <tr class="pad-left-right-space ">
                    <td class="m-b-5" colspan="2" align="left">
                        <p style="font-size: 14px;">{{trans('dashboard.main.status')}} :</p>
                    </td>
                    <td class="m-b-5" colspan="2" align="right">
                        <b>{{ __("dashboard.order.$subscriptionUser->status") }}</b>
                    </td>
                </tr>
                @if($subscriptionUser->coupon_amount == null|| $subscriptionUser->coupon_type ==null)
                @else
                    <tr class="pad-left-right-space ">
                        <td class="m-b-5" colspan="2" align="left">
                            <p style="font-size: 14px;">{{trans('dashboard.discounts.discount')}} :</p>
                        </td>
                        @if($subscriptionUser->coupon_type == 'percent')
                            <td class="m-b-5" colspan="2" align="right">
                                <b>% {{$subscriptionUser->coupon_amount}}</b>
                            </td>
                        @else
                            <td class="m-b-5" colspan="2" align="right">
                                <b>
                                    {{$subscriptionUser->coupon_amount}}
                                    @if(isset($setting[app()->getLocale() . '_currency']))
                                        {{ $setting[app()->getLocale() . '_currency'] }}
                                    @endif
                                </b>

                            </td>
                        @endif
                    </tr>
                @endif
                @if($subscriptionUser->shipping_type == 'delivery')
                <tr class="pad-left-right-space">
                    <td colspan="2" align="left">
                        <p style="font-size: 14px;">{{ trans('dashboard.order.shipping charge') }} :</p>
                    </td>
                    <td colspan="2" align="right">
                        <b>
                            {{ $subscriptionUser->subscription->delivery_price }}
                            @if(isset($setting[app()->getLocale() . '_currency']))
                                {{ $setting[app()->getLocale() . '_currency'] }}
                            @endif
                        </b>
                    </td>
                </tr>
                @endif
                <tr class="pad-left-right-space ">
                    <td class="m-t-5" colspan="2" align="left">
                        <p style="font-size: 14px;">{{ trans('dashboard.order.Total Price') }} : </p>
                    </td>
                    <td class="m-t-5" colspan="2" align="right">
                        <b style>
                            {{ $subscriptionUser->billing_total }}
                            @if(isset($setting[app()->getLocale() . '_currency']))
                                {{ $setting[app()->getLocale() . '_currency'] }}
                            @endif
                        </b>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>

</html>
