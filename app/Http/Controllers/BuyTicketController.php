<?php

namespace App\Http\Controllers;

use App\Models\eSewaPayment;
use App\Models\KhaltiPayment;
use App\Models\Ticket as ModelsTicket;
use App\Models\TicketBooking;
use App\Models\TicketDiscount;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class BuyTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = ModelsTicket::all();

        foreach($tickets as $ticket){
            $actualprice = $ticket->price;
            $discount = $ticket->discount;

            $sellprice =  $actualprice - ($actualprice * ($discount / 100));

            $ticket->price = $sellprice;
            $ticket->setAttribute('actualprice',$actualprice);
        }

        $discount = TicketDiscount::all()->first();

        return view('user.index', [
            'is_booking_close_now' => false,
             'tickets' => $tickets,
             'discount' => $discount
        ]);
    }
    public function mytickets()
    {
        //$tickets = ModelsTicket::all();
        // $tickets = DB::table('ticket_booking_details')
        //     ->join('ticket_booking', 'ticket_booking.id', '=', 'ticket_booking_details.ticket_booking_id')
        //     ->join('tickets', 'tickets.id', '=', 'ticket_booking_details.ticket_id')
        //     ->select('ticket_booking_details.*', 'ticket_booking.*', 'tickets.name', 'tickets.price')
        //     ->where('ticket_booking.users_id', Auth::user()->id)
        //     ->get();

        TicketBooking::where('users_id', Auth::user()->id)
                        ->where('isVerified', false)
                        ->delete();

        $bookings = TicketBooking::where('users_id', Auth::user()->id)
                        ->orderBy('id', 'desc')
                        ->where('isVerified',true)
                        ->whereDate('ticketDate', '>=', Carbon::Now()->subMonths(1))
                        ->get();

        foreach($bookings as $booking){

            $booking_details = DB::table('ticket_booking_details')
                                ->join('tickets', 'ticket_booking_details.ticket_id' , '=' , 'tickets.id')
                                ->select('ticket_booking_details.*', 'tickets.name')
                                ->where('ticket_booking_details.ticket_booking_id', $booking->id)
                                ->get();

            $booking->setAttribute('details', $booking_details);
        }
        return view('user.mytickets', [
             'bookings' => $bookings
        ]);
    }

    // Generate PDF
    public function saveticket($id) {
        // retreive all records from db

        $booking = TicketBooking::find($id);
        $booking_detail = DB::table('ticket_booking_details')
                            ->join('tickets', 'ticket_booking_details.ticket_id' , '=' , 'tickets.id')
                            ->select('ticket_booking_details.*', 'tickets.name')
                            ->where('ticket_booking_details.ticket_booking_id', $id)
                            ->get();

        $booking->setAttribute('details',$booking_detail);
        //share data to view
        view()->share('booking',$booking);
        $pdf = PDF::loadView('ticket.pdf_view', $booking)->setOptions(['defaultFont' => 'sans-serif']);
        $filename = Carbon::today().'_'.Auth::user()->name.'.pdf';
        // download PDF file with download method
        return $pdf->download($filename);
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //checking if the boooking is closed by admin in selected date
        $ticket_booking_statuses = DB::table('ticket_booking_status')
                                    ->select('ticket_booking_status.*')
                                    ->get();

        $requested_date = Carbon::parse($request->date);

        foreach($ticket_booking_statuses as $ticket_booking_status){

            $start_date = Carbon::parse($ticket_booking_status->fromdate);
            $end_date = Carbon::parse($ticket_booking_status->todate);


            if($requested_date->gte($start_date) && $requested_date->lte($end_date)){
                return redirect()->back()->with('msg', 'Bookings are closed from '.date('F d (D), Y', strtotime($start_date)).' to '.date('F d (D), Y', strtotime($end_date)).'. Please select other date.');
            }
        }
        if($request->date == Carbon::now()->format('Y-m-d')){
            if(Carbon::now()->hour >= 17){
                return redirect()->back()->with('msg', 'Booking for today ticket are closed after 5:00pm.');
            }
        }
        $today = Carbon::now()->toDateTimeString();
        $after_one_month = Carbon::now()->addMonth(1);

        $data = $request->except('_token');
        $_tickets_name = [];
        $_tickets_qty = [];

        foreach($data as $id => $value){
            if($id == 'date'){
                break;
            }
            array_push($_tickets_name, $id);
            array_push($_tickets_qty, $value);
        }
        $validated = $request->validate([
            $_tickets_name[0] => 'numeric|gte:0',
            $_tickets_name[1] => 'numeric|gte:0',
            'date' => 'required||date||after:yesterday||before:'.$after_one_month
        ]);

        if($_tickets_qty[0] == "0" && $_tickets_qty[1] == "0"){
            return redirect('/buytickets')->with('errormsg', 'Atleast one ticket is required!');;
        }

        $latestOrder = TicketBooking::orderBy('id','DESC')->first();
        // $orderNo = 'ORDER-'.str_pad(empty($latestOrder) ? "1" : $latestOrder->id + 1, 5, "0", STR_PAD_LEFT).random_int(1000, 9999);
        $orderNo = 'OR-'.(empty($latestOrder) ? "1" : $latestOrder->id + 1);

        $payment_method = $request->customRadio;

        if($payment_method == 'Esewa'){
            $amt = $request->total;
            $discount = $request->discountAmt;
            $sellprice =  intval($amt) - (intval($amt) * (intval($discount) / 100));
        }
        else if($payment_method == 'Khalti'){
            $amt = $request->total;
            $discount = $request->discountAmt;
            $sellprice =  intval($amt) - (intval($amt) * (intval($discount) / 100));
        }
        else{
            $amt = $request->total;
            $discount = 0;
            $sellprice =  $request->total;
        }

        // $amt = $request->total;
        // $discount = $request->discountAmt;
        // $sellprice =  intval($amt) - (intval($amt) * (intval($discount) / 100));

        //insert into ticket_booking
        DB::table('ticket_booking')->insert([
            'orderNo' => $orderNo,
            'users_id' => Auth::user()->id,
            'ticketDate' => $request->date,
            'bookingDate' => $today,
            'amount' => $amt,
            'discount' => $discount,
            'total' => $sellprice,
            'payment_method' => $payment_method,
            'refId' => ' ',
            'isCancelled' => 0,
            'isPaid' => 0,
            'paidDate' => $today,
            'isVerified' => false,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        $last_id = DB::getPdo()->lastInsertId();;
        //insert ticket_booking_detail

        foreach($data as $id => $value){
            if($id == 'date'){
                break;
            }
            //insert ticket_booking_detail
            DB::table('ticket_booking_details')->insert([
                'ticket_booking_id' => $last_id,
                'ticket_id' => substr($id, strpos($id, "_") + 1),
                'quantity' => $value
            ]);
        }

        if($payment_method == 'Esewa'){

            $eSewaPayment = new eSewaPayment([
                'amt'=> $sellprice,
                'pdc'=> 0,
                'psc'=> 0,
                'txAmt'=> 0,
                'tAmt'=> $sellprice,
                'pid'=>$orderNo,
            ]);

            return view('eSewaPaymentConfirm', [
                'eSewaPayment' => $eSewaPayment,
                'amount' => $amt,
                'discount' => $discount,
                'sellprice' => $sellprice
            ]);
        }
        else if($payment_method == 'Khalti'){
            $khaltiPayment = new KhaltiPayment([
                'productIdentity'=> $orderNo,
                'productName'=> config('global.PRODUCT_NAME'),
                'productUrl'=> config('global.PRODUCT_URL'),
                'amount'=> intval($sellprice) * 100
            ]);

            return view('khaltiPaymentConfirm',[
                'khaltiPayment' => $khaltiPayment,
                'amount' => $amt,
                'discount' => $discount,
                'sellprice' => $sellprice
            ]);
        }
        else if($payment_method == 'Cash'){
            $order = TicketBooking::where('id', $last_id)->firstOrfail();

            $order->update([
                'isVerified' => true
            ]);

            return redirect('/mytickets')->with('success', 'Ticket booked successfully!');
        }

        //return redirect('/buytickets')->with('success', 'Ticket booked successfully!');;
    }

    public function cancelticket($id){

        DB::table('ticket_booking')
              ->where('id', $id)
              ->update(['isCancelled' => 1]);


        return redirect('/mytickets')->with('msg', 'Ticket cancelled successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
