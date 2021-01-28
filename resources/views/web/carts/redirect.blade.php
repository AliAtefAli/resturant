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
<form id="payment-form" style="display: none" action="{{ route('order.store') }}" method="post" class="finsh-requet">
    @csrf

    <input id="payment" class="payment_method" type="radio" name="payment_method"
           value="payment" checked>
    <span></span>
    <input id="on_delivery" class="payment_method" type="radio" name="payment_method"
           value="on_delivery">
    <input type="text" name="billing_name"
           value="{{ session()->get('billing.billing_name') }}">
    <input type="text" name="billing_phone"
           value="{{ session()->get('billing.billing_phone') }}">
    <input type="email" name="billing_email"
           value="{{ session()->get('billing.billing_email') }}">
    <input type="text" class="form-control" name="billing_address"
           value="{{ session()->get('billing.billing_address') }}" id="search-input">
    <input type="hidden" id="lat" name="lat"
           value="{{ session()->get('billing.lat') }}">
    <input type="hidden" id="lng" name="lng"
           value="{{ session()->get('billing.lng') }}">

    <input id="transaction_id" name="transaction_id" type="text" value="">
    <input id="payment_type" name="payment_type" type="text" value="">
    <button type="submit">
        {{ __('site.Order.Confirm Order') }}
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
                document.getElementById('payment_type').value = response.callback.source.payment_method;
                document.getElementById('payment-form').submit();
            } else {
                {{ session()->flash('error', trans("site.Something went wrong, please try again")) }}
                window.location.href = "{{ route('carts') }}";
            }
        }
    });
</script>
</html>


