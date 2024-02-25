<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class resultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $booking = [
            [
                'id' => '1',
                'user_id' => '2',
                'stylist_id' => '3',
                'timesheet_id' => '4',
                'date' => '1-10-2023',
                'special_requirement' => 'ko co yeu cau j',
                'is_consultant' => '2',
                'is_accept_take_a_photo' => '0',
                'status'=> '1',
            ],
            [
                'id' => '2',
                'user_id' => '3',
                'stylist_id' => '4',
                'timesheet_id' => '5',
                'date' => '1-10-2023',
                'special_requirement' => 'ko co yeu cau j',
                'is_consultant' => '2',
                'is_accept_take_a_photo' => '2',
                'status'=> '2',
            ],
            [
                'id' => '3',
                'user_id' => '1',
                'stylist_id' => '2',
                'timesheet_id' => '6',
                'date' => '1-10-2023',
                'special_requirement' => 'ko co yeu cau j',
                'is_consultant' => '1',
                'is_accept_take_a_photo' => '1',
                'status'=> '2',
            ]
        ];
        $results = [];

        foreach ($booking as $bookingData) {
            if ($bookingData['status'] === '2') {
                
                $results[] = [
                    'booking_id' => $bookingData['id'],
                    'image' => 'https://tse1.mm.bing.net/th?id=OIP.OF59vsDmwxPP1tw7b_8clQHaE8&pid=Api&rs=1&c=1&qlt=95&w=185&h=123'
                ];
            }
        } 
        // dd($results);
        foreach ($results as $resultData) {
           DB::table('results')->insert($resultData);
        }
    }
}
