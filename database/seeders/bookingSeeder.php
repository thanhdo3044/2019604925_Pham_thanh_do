<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class bookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $test = [];
        $startDate = strtotime('2023-01-01');
        $endDate = strtotime('2023-12-31');

        $randomTimestamp = rand($startDate, $endDate);
        $randomDate = date('Y-m-d', $randomTimestamp);
        for ($i = 1; $i <= 10; $i++) {
            $test[] = [
                'user_id' => random_int(1, 10),
                'stylist_id'  => random_int(1, 10),
                'timesheet_id'  => random_int(1, 10),
                'price' => random_int(10000,10000000),
                'date' => $randomDate,
                'is_consultant' => random_int(1, 2),
                'is_accept_take_a_photo' => random_int(1, 2),
                'status' => random_int(1, 2),

            ];
        }
        DB::table('bookings')->insert($test);
    }
}
