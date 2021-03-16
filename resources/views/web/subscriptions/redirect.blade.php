
<html>
<head>
    <title>Show Result Demo</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <link rel="shortcut icon" href="https://goSellJSLib.b-cdn.net/v1.6.0/imgs/tap-favicon.ico"/>
    <link href="https://goSellJSLib.b-cdn.net/v1.6.0/css/gosell.css" rel="stylesheet"/>
</head>
<body>

<script type="text/javascript" src="https://goSellJSLib.b-cdn.net/v1.6.0/js/gosell.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<div id="root"></div>
<form id="payment-form" style="display: none" class="form-pic-select" method="post"
      action="{{ route('subscriptions.store') }}">
    @csrf

    <input type="date" name="start_date" value="{{ session()->get('subscription.start_date') }}">
    <input type="date" name="end_date"  value="{{ session()->get('subscription.end_date') }}">

    <input type="number" name="people_count" min="1" value="{{ session()->get('subscription.people_count') }}">
    <input class="local-global" id="local" type="radio" name="shipping_type" value="local" checked>
    <input class="local-global" id="global" type="radio" name="shipping_type" value="delivery"  @if(session()->get('subscription.shipping_type') == 'delivery' ) checked @endif>
    <span></span>
    <input type="text" name="billing_address" id="search-input" value="{{ auth()->user()->address }}">
    <div class="map" id="map" style="width: 100%; height: 300px;"></div>
    <input type="hidden" id="lat" name="lat" value="{{ session()->get('subscription.lat') }}">
    <input type="hidden" id="lng" name="lng" value="{{ session()->get('subscription.lng') }}">
    <input type="text" name="detailed_address" value="{{ session()->get('subscription.detailed_address') }}">
    <input type="text" name="validation_start_date" value="{{ session()->get('subscription.validation_start_date') }}">
    <input type="text" name="validation_end_date" value="{{ session()->get('subscription.validation_end_date') }}">
    <input type="radio" name="payment_type" value="on_delivery" checked>
    <input type="radio" name="payment_type" value="credit_card"  @if(session()->get('subscription.payment_type') == 'credit_card' ) checked @endif>

    <textarea name="note">{{ session()->get('subscription.note') }}</textarea>
    <input type="hidden" name="subscription_id" value="{{ session()->get('subscription.subscription_id') }}">
    <input id="payment_method" name="payment_method" type="text" value="">
    <input type='text' value="{{ session()->get('subscription.billing_total') }}" name="billing_total">

    <input id="transaction_id" name="transaction_id" type="text" value="">
    <button class="btn-aaa" type="submit">
        {{__('site.Submit Now')}}
    </button>

</form>
</body>
<script src="{{asset('web_files/js/jquery-3.4.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script>
    console.log('redirect');
    goSell.showResult({
        callback: response => {
            if (response.callback.response.message === 'Captured') {
                document.getElementById('transaction_id').value = response.callback.id;
                document.getElementById('payment_method').value = response.callback.source.payment_method;
                document.getElementById('payment-form').submit();
            } else {
                {{ session()->flash('error', trans(  "site.Something went wrong, please try again")) }}
                    window.location.href = "{{ route('subscriptions.create', session()->get('subscription.subscription_id')) }}";
            }
        }
    });
</script>
</html>


