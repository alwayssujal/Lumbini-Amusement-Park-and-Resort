<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tickets')->insert([
            [
                'name' => 'Adult Ticket',
                'description' => 'Current adult ticket price - Rs. 500',
                'price' => '500',
                'discount' => '0',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ],
            [
                'name' => 'Child Ticket',
                'description' => 'Current children ticket price - Rs. 300',
                'price' => '300',
                'discount' => '0',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]
        ]
        );

        DB::table('ticket_discount')->insert([
            [
                'name' => 'Discount if paid Online',
                'description' => 'Discount - 10% (If paid through online)',
                'discountAmt' => 10,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
            ]
        ]
        );
    }
}
