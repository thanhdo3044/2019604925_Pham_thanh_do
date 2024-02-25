<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class stylistSeed extends Seeder
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
             
                'name'=> 'Pham Van'. random_int(1,10),
                'phone'=> random_int(1, 10),
                'excerpt'=> 'oki',
                'image'=> 'image',

            ];
        }
        DB::table('stylists')->insert($test);
    }
}
