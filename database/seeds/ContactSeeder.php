<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'message' => 'Contact us if you have a question that you cannot explain, to do so please fill in the message with your name and email, we will notify you again by email.',
            'address' => '856 Cordia Extension Apt. 356, Lake, US',
            'phone' => '0212345678',
            'email' => 'contact@draumastofa.com',
            'fax' => '0212245876',
            'created_at' => date(now()),
            'updated_at' => date(now()),
        ]);
    }
}
