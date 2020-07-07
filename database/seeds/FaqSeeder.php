<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            'question' => 'What is draumastofa ?',
            'answer' => 'Draumastofa is a hotel that is spread all over Indonesia, what you are seeing right now is our online service to make it easy for you to book a room at Draumastofa.',
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
        DB::table('faqs')->insert([
            'question' => 'What do I get by using this service ?',
            'answer' => 'After you use this service you will feel how easy it is to book a room whenever and wherever you are.',
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
        DB::table('faqs')->insert([
            'question' => 'How do I book a room using this service ?',
            'answer' => 'First of all you have to log in through our system by clicking the login button in the upper right hand corner of this page, after you login you can book any room available with this service.',
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
        DB::table('faqs')->insert([
            'question' => 'What payment methods are available at this service ?',
            'answer' => 'Payment methods available in our service are cash, bank transfer, visa / master card, and cryptocurrency.',
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
        DB::table('faqs')->insert([
            'question' => 'How do I want to occupy the room I booked ?',
            'answer' => 'please go to our receptionist and show the barcode or code book that is on your dashboard.',
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
    }
}
