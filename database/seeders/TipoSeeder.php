<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos')->insert([
            [
                "nombre" => "SP"
            ],
            [
                "nombre" => "TUP"
            ],
            [
                "nombre" => "SCP"
            ],
            [
                "nombre" => "SCEP"
            ],
            [
                "nombre" => "MES"
            ],
            [
                "nombre" => "AFS"
            ],
            [
                "nombre" => "AD"
            ],
            [
                "nombre" => "M"
            ]
        ]);
    }
}
