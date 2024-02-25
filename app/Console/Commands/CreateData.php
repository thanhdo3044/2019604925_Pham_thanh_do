<?php

namespace App\Console\Commands;

use App\Models\Service;
use App\Models\Service_categories;
use App\Models\Stylist;
use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Console\Command;

class CreateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Service_categories::query()->updateOrCreate([
            'name' => 'Cắt gội xả massage',
            'is_active' => 1
        ]);

        $data = User::query()->updateOrCreate([
            'phone_number' => '+840342599803',
            'name' => '6x pro',
            'image' => '',
            'excerpt' => '',
            'user_type' => 'ADMIN',
            'remember_token' => '',
            'created_at' => '2023-11-04 11:48:01',
            'updated_at' => '2023-11-04 11:48:01'
        ]);
        $data->assignRole(1);

        $hour = 7;
        $minutes = '00';
        $check = true;
        $condition = 0;
        for ($i = 0; $i < 29; $i++){
            Timesheet::query()->updateOrCreate([
                'hour' => $hour,
                'minutes' => $minutes,
                'is_active' => 1
            ]);
            $check = !$check;
            if ($check){
                $minutes = '00';
            }else{
                $minutes = '30';
            }
            $condition++;
            if ($condition == 2){
                $hour++; $condition = 0;
            }else{
                continue;
            }
        }

    }
}
