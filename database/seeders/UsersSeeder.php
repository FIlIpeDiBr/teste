<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'Software Admin',
            'email'=>'admin@ufam.edu.br',
            'siape'=>'0000000',
            'password'=>Hash::make('174sh396@'),
            'role'=>'admin'
        ]);
    }
}
