<?php

namespace App\Http\Controllers;

use App\Models\TicketBooking;
use App\Models\TicketBuy;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDO;
use Ticket;

use function GuzzleHttp\Promise\all;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $booking_before_today = TicketBooking::where('payment_method', 'Cash')
                                ->where('ticketDate', '<', Carbon::today())
                                ->update([
                                    'isCancelled' => 1
                                ]);

        $ticket_sales_today = DB::table('ticket_booking')
                                ->select(DB::raw('count(*) as total'))
                                ->where('isCancelled',false)
                                ->where('isVerified',true)
                                ->where('isPaid',true)
                                ->whereDate('ticket_booking.bookingDate', Carbon::today())
                                ->get()
                                ->first();

        $new_users_today = DB::table('users')
                            ->select(DB::raw('count(*) as total'))
                            ->whereDate('users.created_at', Carbon::today())
                            ->get()
                            ->first();

        $total_ticket_sales = DB::table('ticket_booking')
                            ->select(DB::raw('count(*) as total'))
                            ->where('isPaid',true)
                            ->where('isCancelled', false)
                            ->where('isVerified', true)
                            ->get()
                            ->first();

        $total_customers = DB::table('users')
                            ->select(DB::raw('count(*) as total'))
                            ->where('isAdmin', false)
                            ->get()
                            ->first();

        $recent_bookings = DB::table('ticket_booking')
                            ->join('users', 'ticket_booking.users_id' , '=' , 'users.id')
                            ->select('ticket_booking.*', 'users.name as customer_name')
                            ->where('isVerified',true)
                            ->take(5)
                            ->orderBy('ticket_booking.id', 'DESC')
                            ->get();
        foreach($recent_bookings as $recent_booking){

            $ticket_details = DB::table('ticket_booking_details')
                                ->join('tickets', 'ticket_booking_details.ticket_id' , '=' , 'tickets.id')
                                ->select('ticket_booking_details.*', 'tickets.name')
                                ->where('ticket_booking_details.ticket_booking_id', $recent_booking->id)
                                ->get();

            $recent_booking->details = $ticket_details;
        }
        return view('admin.index',
                    [
                        'ticket_sales_today' => $ticket_sales_today,
                        'new_users_today' => $new_users_today,
                        'total_ticket_sales' => $total_ticket_sales,
                        'total_customers' => $total_customers,
                        'recent_bookings' => $recent_bookings

                    ]);
    }
    public function booking()
    {
        //$tickets = TicketBooking::all();

        $tickets = DB::table('ticket_booking')
                    ->join('users', 'ticket_booking.users_id' , '=' , 'users.id')
                    ->select('ticket_booking.*', 'users.name as customer_name')
                    ->where('isVerified',true)
                    ->orderBy('ticket_booking.id', 'desc')
                    ->get();

        foreach($tickets as $ticket){

            $ticket_details = DB::table('ticket_booking_details')
                                ->join('tickets', 'ticket_booking_details.ticket_id' , '=' , 'tickets.id')
                                ->select('ticket_booking_details.*', 'tickets.name')
                                ->where('ticket_booking_details.ticket_booking_id', $ticket->id)
                                ->get();

            $ticket->details = $ticket_details;
        }
        return view('admin.booking', ['tickets' => $tickets]);
    }
    public function customer()
    {
        //SELECT * FROM USERS WHERE isAdmin = false

        $users =  DB::table('users')
                ->leftJoin('ticket_booking', function($leftjoin){
                    $leftjoin->on('users.id', '=', 'ticket_booking.users_id')
                    ->where('ticket_booking.isCancelled', false)
                    ->where('ticket_booking.isVerified', true)
                    ->where('ticket_booking.isPaid', true);
                })
                ->select('users.id', 'users.name', 'users.email', 'users.phone', DB::raw('COUNT(ticket_booking.users_id) AS total_tickets'))
                ->where('users.isAdmin', false)
                ->groupBy('users.id', 'users.name', 'users.email', 'users.phone')
                ->get();
        return view('admin.customer',['users' => $users]);
    }
    public function bookingstatus()
    {
        $booking_statuses = DB::table('ticket_booking_status')
                            ->whereDate('ticket_booking_status.todate', '>=', Carbon::today())
                            ->where('isClosed', true)
                            ->get();

        return view('admin.bookingstatus')->with('booking_statuses', $booking_statuses);
    }
    public function updateBookingStatus(Request $request)
    {
        $validated = $request->validate([
            'fromdate' => 'required||date||after:yesterday',
            'todate' => 'required||date||after:'.$request->fromdate
        ]);
        
        $ticket_booking_statuses = DB::table('ticket_booking_status')
                                    ->select('ticket_booking_status.*')
                                    ->get();

        foreach($ticket_booking_statuses as $ticket_booking_status){

            $start_date = Carbon::parse($ticket_booking_status->fromdate);
            $end_date = Carbon::parse($ticket_booking_status->todate);

            $requested_fromdate = Carbon::parse($request->fromdate);
            $requested_todate = Carbon::parse($request->todate);

            if($requested_fromdate == $start_date && $requested_todate== $end_date){
                return redirect()->back()->with('msg', 'Bookings Status already exist. Please select other date.');
            }
        }

        DB::table('ticket_booking_status')->insert([
            'fromdate' => $request->input('fromdate'),
            'todate' => $request->input('todate'),
            'isClosed' => true,
        ]);

        return redirect('/admin/bookingstatus');
    }
    public function openBookingStatus($id){
        DB::table('ticket_booking_status')
                ->where('id', $id)
                ->delete();

                return redirect('/admin/bookingstatus');
    }
    public function accept_payment($id){
        $ticket = TicketBooking::where('id', $id)->update([
            'isPaid' => 1,
            'payment_method' => 'Cash'
        ]);

        return redirect()->back()->with('success', 'Payment Accepted.');
    }
    public function cancel_payment($id){
        $ticket = TicketBooking::where('id', $id)->update([
            'isPaid' => 0,
        ]);

        return redirect()->back()->with('success', 'Payment Cancelled.');
    }
}
