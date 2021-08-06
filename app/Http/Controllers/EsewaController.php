<?php

namespace App\Http\Controllers;

use App\Models\TicketBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EsewaController extends Controller
{
    public function verify(Request $request){
        $status = $request->q;
        //dd($status);
        $oid = $request->oid;
        $refId = $request->refId;
        $amt = $request->amt;

        $order = TicketBooking::where('orderNo', $oid)->firstOrfail();

        if(!empty($order)){
            $url = "https://uat.esewa.com.np/epay/transrec";
            $data =[
                'amt'=> $order->total,
                'rid'=> $refId,
                'pid'=>$order->orderNo,
                'scd'=> config('global.ESEWA_MERCHANT_CODE')
            ];

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                curl_close($curl);

                if(strpos($response, "Success")){
                    //transaction verified successfully
                    //dd("success");
                    $order->update([
                        'isPaid' => true,
                        'refId' => $refId,
                        'isVerified'=>true
                    ]);

                    return redirect()->route('mytickets')->with('success', 'Payment Successfull.');
                }
                else{
                    //transaction verification failed
                    //dd("failed");
                    return redirect()->route('mytickets')->with('error', 'Payment was not successfull.');
                }
        }
    }
}
