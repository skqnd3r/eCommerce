<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
            'email' => "admin@email.com",
            'lastname' => "Person",
            'firstname' => "Admin",
            'password' => Hash::make('password'),
            'admin' => 1,
        ]);
        
        DB::table('users')->insert([
            'email' => "client@email.com",
            'lastname' => "Person",
            'firstname' => "Client",
            'password' => Hash::make('password'),
            'admin' => 0,
        ]);
    }
}
