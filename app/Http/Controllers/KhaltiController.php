<?php

namespace App\Http\Controllers;

use App\Models\TicketBooking;
use Illuminate\Http\Request;

class KhaltiController extends Controller
{
    //
    public function verify(Request $request){
        $token = $request->token;
        $oid = $request->product_identity;

        $order = TicketBooking::where('orderNo', $oid)->firstOrfail();

        $args = http_build_query(array(
            'token' => $token,
            'amount'  => intval($order->amount) * 100
        ));

        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $secret_key = config('global.KHALTI_SECRET_KEY');

        $headers = ['Authorization: Key $secret_key'];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $token = json_decode($response, TRUE);

        if ($status_code == 200)
        {
            $order->update([
                'isPaid' => 1 ,
                'refId' => $token['idx'],
                'isVerified' => true

            ]);

            return response()->json(['success' => 1, 'redirectTo' =>route('mytickets')]);
        }
        else{
            $order->delete();
            return response()->json(['error' => 1, 'message' => 'Payload Failed', 'response' => $response]);
        }
    }
}
