<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        //
       User::create([
            'name' => 'Mario Mamdouh',
           'email' => 'mariomamdouh237@gmail.com',
           'password' => bcrypt('mario237'),
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
       ]);
    }
}
