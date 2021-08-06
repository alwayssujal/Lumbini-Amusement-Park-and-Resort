<?php

namespace App\Http\Controllers;

use App\Models\TicketDiscount;
use Illuminate\Http\Request;

class TicketDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SELECT * FROM ticketdiscount
        $discounts = TicketDiscount::all();

        return view('ticket.ticketdiscount', [
            'discounts' => $discounts
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketDiscount  $ticketDiscount
     * @return \Illuminate\Http\Response
     */
    public function show(TicketDiscount $ticketDiscount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketDiscount  $ticketDiscount
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketDiscount $ticketDiscount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketDiscount  $ticketDiscount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketDiscount $ticketDiscount)
    {
        $ticketDiscount->update([
            'name' => $request->input('name'),
            'discountAmt' => $request->input('discount'),
            'description' => $request->input('description')
        ]);
        return redirect('/ticket_discount')->with('success', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketDiscount  $ticketDiscount
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketDiscount $ticketDiscount)
    {
        //
    }
}
