<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Stylist;
use App\Models\User;
use Illuminate\Http\Request;

class ClientTeamController extends Controller
{
    public function index(){
        $stylists= Stylist::all();
        return view('client.display.teams',compact('stylists'));
    }
    public function detailbarber(string $id){
        $detailbarber = User::query()->where('user_type', 'STYLIST')->findOrFail($id);
//        dd($detailbarber);
        return view('client.display.team-details',compact('detailbarber'));
    }
}
