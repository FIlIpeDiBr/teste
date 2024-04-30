<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laboratories')->insert([
            [
            'id'=>'309D',
            'description'=>'Laboratório de programação'
            ],[
            'id'=>'311D',
            'description'=>'Laboratório de tecnologia da informação'
            ],[
            'id'=>'312D',
            'description'=>'Laboratório de desenvolvimento de produtos tecnologicos'
            ]]);
    }
}
