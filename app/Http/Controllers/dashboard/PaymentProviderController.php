<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Auth;

class PaymentProviderController extends Controller
{
    //
    public function getcheckout($price)
    {

        $url = "https://test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=" . $price .
            "&currency=EUR" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $res = json_decode($responseData, true);

        return    redirect('/payment-checkout/' . $res['id']);

        // $responseData = request();
    }

    public function GetPaymentStatus()
    {
        if ($_REQUEST != null) {

            $resourcePath = $_REQUEST['resourcePath'];
            $url = "https://test.oppwa.com";
            $url .= $resourcePath;
            $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='
            ));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if (curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);
            $id = json_decode($responseData, true);

            if ($id['id']) {
                $order = Order::where(['client_id' => Auth::id(), 'payment' => NULL])->first();
                $order->payment = 'done';
                $order->save();
                return redirect('/')->with('success', 'تم الدفع');
            } else {
                return redirect('/')->with('sorry', ' لم يتم الدفع');
            }
        }
        else{
            return redirect('/');

        }

        // $responseData = request();
    }
}
