<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketBuy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketBuy', function (Blueprint $table) {
            $table->id();
            $table->integer('userId');
            $table->integer('ticketId');
            $table->integer('quantity');
            $table->integer('totalAmount');
            $table->dateTime('boughtDate');
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
