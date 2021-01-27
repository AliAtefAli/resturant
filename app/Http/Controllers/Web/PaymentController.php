<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function check()
    {
        $config =
            [
                'ApiKey' => '1tap7',
                'UserName' => 'test',
                'Password' => 'test',
                'MerchantID' => '1014',
                'ErrorURL' => 'http://test.com/error-url', // optional. default(NULL)
                'PaymentOption' => 'KNET', // optional. default (ALL)
                'AutoReturn' => 'N', // optional. default (Y)
                'CurrencyCode' => 'KWD', // optional. default (KWD)
                'LangCode' => 'EN', // optional. default(AR)
            ];

        /**
         *
         * set the products that has to be purchased by the customer
         *
         * required fields (
         *     Quantity,
         *     TotalPrice,
         *     UnitName,
         *     UnitDesc,
         *     UnitPrice
         * )
         *
         * optional fields (
         *    ImgUrl,
         *    VndID
         * )
         *
         * note that you dont need to pass currency code in products list, as you are already passing it in the config.
         *
         */

        $products =
            [
                [
                    'Quantity' => '1',
                    'TotalPrice' => '500',
                    'UnitName' => 'Product Name',
                    'UnitDesc' => 'Product Description',
                    'UnitPrice' => '500',
                ],
                [
                    'Quantity' => '2',
                    'TotalPrice' => '300',
                    'UnitName' => 'Product Name',
                    'UnitDesc' => 'Product Description',
                    'UnitPrice' => '150',
                ]
            ];

        $customer =
            [
                'Email' => 'customer@email.com',
                'Name' => 'Awesome Customer',
                'Mobile' => '9999999',
            ];

// by default the package sets gateway to 'ALL', however, you can pass the below method if you need to set the gateway to other available options (KNET,VISA,MASTER,AMEX)

// optional
        $gateway = ['Name' => 'KNET'];

        $merchant =
            [
                'ReturnURL' => 'http://test.com/payment/returnurl',
                'ReferenceID' => uniqid(),
            ];

        $billing = new IZaL\Tap\TapBilling($config);

        $billing->setProducts($products);
        $billing->setCustomer($customer);
        $billing->setGateway($gateway);
        $billing->setMerchant($merchant);

// request for payment url

        try {

            $paymentRequest = $billing->requestPayment();

            $response = $paymentRequest->response->getRawResponse();

            $paymentURL = $response->PaymentURL;


            // With the response object, you can redirect the user to the payment page

            // redirect url
            $paymentURL = $response->PaymentURL;

            // reference id
            $paymentReferenceID = $response->ReferenceID;

        } catch (\Exception $e) {

            var_dump($e->getMessage());
            // do something with the error

        }
    }
}
