<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

require_once __DIR__ . '../../../PaytmKit/lib/config_paytm.php';
require_once __DIR__ . '../../../PaytmKit/lib/encdec_paytm.php';


class PaytmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->payment_type == 'paytm') {
            // $this->validateRequest($request);
            $data = [
                "ORDER_ID" => rand(111111, 999999),
                "CUST_ID" => rand(111111, 999999),
                "INDUSTRY_TYPE_ID" => "Retail",
                "CHANNEL_ID" => 'WEB',
                "TXN_AMOUNT" => $request->price,
                "MID" => PAYTM_MERCHANT_MID,
                "WEBSITE" => PAYTM_MERCHANT_WEBSITE,
                "CALLBACK_URL" => CALLBACK_URL,
                "MOBILE_NO" => "8890070352",
                "EMAIL" => "gulgulia17@gmail.com",
            ];
            $data['CHECKSUMHASH'] = getChecksumFromArray($data, PAYTM_MERCHANT_KEY);
            $this->payment($data);
        } else {
            echo "Thankyou you can shop more now.";
        }
    }

    public function status(Request $request)
    {
        $response = [
            "ORDERID" => $request->ORDERID,
            "TXNID" => $request->TXNID,
            "TXNAMOUNT" => $request->TXNAMOUNT,
            "PAYMENTMODE" => $request->PAYMENTMODE,
            "TXNDATE" => $request->TXNDATE,
            "STATUS" => $request->STATUS,
            "RESPCODE" => $request->RESPCODE,
            "BANKNAME" => $request->BANKNAME,
        ];
        return view('ordered', compact('response'));
    }

    protected function validateRequest($request)
    {
        $request->validate([
            "fname" => 'required|string',
            "lname" => 'required|string',
            "phone" => 'required',
            "add1" => 'required|string',
            "add2" => '',
            "city" => 'required|string',
            "zip" => 'required|string',
            "price" => 'required',
        ]);
    }

    public function payment($data)
    {
        $url = PAYTM_TXN_URL;
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {
            print_r($result);
        }
        echo $result;
    }
}
