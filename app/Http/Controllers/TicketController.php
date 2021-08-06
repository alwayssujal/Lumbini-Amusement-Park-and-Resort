<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SELECT * FROM tickets
        $tickets = Ticket::all();

        foreach($tickets as $ticket){
            $actualprice = $ticket->price;
            $discount = $ticket->discount;

            $sellprice =  $actualprice - ($actualprice * ($discount / 100));

            $ticket->price = $sellprice;
            $ticket->setAttribute('actualprice',$actualprice);
        }
        
        return view('ticket.index', [
            'tickets' => $tickets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $ticket = Ticket::create([
        //     'name' => $request->input('name'),
        //     'description' => $request->input('description'),
        //     'price' => $request->input('price'),
        //     'discount' => $request->input('discount'),
        // ]);
        // return redirect('/ticket');
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
        $ticket = DB::table('tickets')->where('id', $id)->first();
        return view('ticket.edit')->with('ticket', $ticket);
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
        $validated = $request->validate([
            'price' => 'numeric|gte:0',
            'discount' => 'numeric|gte:0|lte:100'
        ]);

        $ticket = Ticket::where('id', $id)->update([
            'name' => $request->input('name'),
            'description' => 'This is description',
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
        ]);
        return redirect('/ticket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        // $ticket->delete();
        // return redirect('/ticket');
    }
}
