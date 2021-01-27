<html>
<head>
    <title>goSell Demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="shortcut icon" href="https://goSellJSLib.b-cdn.net/v1.6.0/imgs/tap-favicon.ico"/>
    <link href="https://goSellJSLib.b-cdn.net/v1.6.0/css/gosell.css" rel="stylesheet"/>
</head>
<body>
<script type="text/javascript" src="https://goSellJSLib.b-cdn.net/v1.6.0/js/gosell.js"></script>

<div id="root"></div>
<script>
    goSell.openLightBox();
</script>

<script>

</script>

<script>

    var publicKey = "{{ $setting['payment_api'] }}",
        language = "{{ app()->getLocale() }}",
        userName = "{{ auth()->user()->name }}",
        userPhone = "{{ auth()->user()->phone }}",
        userEmail = "{{ auth()->user()->email }}",
        orderAmount = {{ $request->billing_total }};


    goSell.config({
        gateway: {
            publicKey: publicKey,
            merchant_id: "",
            language: language,
            contactInfo: false,
            supportedCurrencies: "all",
            supportedPaymentMethods: "all",
            saveCardOption: true,
            customerCards: true,
            notifications: "standard",
            callback: (response) => {
                console.log("callback", response);
            },
            onClose: () => {
                console.log("onclose hey");
            },
            onLoad:() => {
                console.log("loaded function");
                goSell.openLightBox();
            },
            style: {
                base: {
                    color: "red",
                    lineHeight: "10px",
                    fontFamily: "sans-serif",
                    fontSmoothing: "antialiased",
                    fontSize: "10px",
                    "::placeholder": {
                        color: "rgba(0, 0, 0, 0.26)",
                        fontSize: "10px",
                    },
                },
                invalid: {
                    color: "red",
                    iconColor: "#fa755a ",
                },
            },
        },
        customer: {
            first_name: userName,
            middle_name: null,
            last_name: null,
            email: userEmail,
            phone: {
                country_code: "+966",
                number: userPhone,
            },
        },
        order: {
            amount: orderAmount,
            currency: "SAR",
        },
        transaction: {
            mode: "charge",
            charge: {
                auto: {
                    time: 100,
                    type: "VOID",
                },
                saveCard: false,
                threeDSecure: true,
                description: "description",
                statement_descriptor: "statement_descriptor",
                reference: {
                    transaction: "txn_0001",
                    order: "ord_0001",
                },
                metadata: {},
                receipt: {
                    email: false,
                    sms: true,
                },
                redirect: "http://resturant.dev.com/redirect",
                post: null,
            }
        },
    });
</script>

</body>
</html>
