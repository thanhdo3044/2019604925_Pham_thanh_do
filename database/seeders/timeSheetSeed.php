<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class timeSheetSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $test = [];
        for ($i = 1; $i <= 10; $i++) {
            $test[] = [

                'hour'=>random_int(1, 10),
                'minutes'=>random_int(1,30),
                'is_active'=>random_int(0,1),
            ];
        }
        DB::table('timeSheets')->insert($test);
    }
}
