<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
                array(
                    'name' => 'Website Admin',
                    'isAdmin' => true,
                    'phone' => '9857039218',
                    'email' => 'info@lumbinifunpark.com',
                    'password' => Hash::make('lumbiniadmin@123'),
                    "created_at" =>  \Carbon\Carbon::now(),
                    "updated_at" => \Carbon\Carbon::now(),
                )
            );
    }
}
