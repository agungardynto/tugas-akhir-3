<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'gender' => 'P',
            'address' => 'Perum Permata Sepatan Blok C 18 / N 11, Sepatan Tangerang',
            'phone_number' => '082179099557',
            'email' => 'agungardynto@gmail.com',
            'password' => Hash::make('12345678'),
            'foto' => 'admin_default.png',
            'role' => '1'
        ]);
        copy('public/img/admin_default.png', 'storage/app/public/admin_default.png');
    }
}
