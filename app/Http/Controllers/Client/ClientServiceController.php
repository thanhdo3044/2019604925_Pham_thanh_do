<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\FakeServices;
use App\Models\Service;
use Illuminate\Http\Request;

class ClientServiceController extends Controller
{
    const OBJ = 'client.display';
    const DOT = '.';
    public function services(){
        $data = Service::query()->get();

        return view(self::OBJ. self::DOT . __FUNCTION__, compact('data'));
    }
    public function servicesPage(string $id)
    {
        $model = Service::query()->with(['category', 'images'])->findOrFail($id);
        $data = Service::query()->get();
        return view(self::OBJ . self::DOT . __FUNCTION__, compact('model', 'data'));
    }
}
