<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ticket_booking', function (Blueprint $table) {
            $table->id();
            $table->longText('orderNo')->unique();
            $table->integer('users_id');
            $table->date('ticketDate');
            $table->date('bookingDate');
            $table->integer('amount');
            $table->integer('discount');
            $table->integer('total');
            $table->text('payment_method');
            $table->longText('refId');
            $table->boolean('isCancelled');
            $table->boolean('isPaid');
            $table->date('paidDate');
            $table->boolean('isVerified');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
