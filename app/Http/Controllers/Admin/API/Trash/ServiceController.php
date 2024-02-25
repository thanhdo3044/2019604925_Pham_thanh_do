<?php

namespace App\Http\Controllers\Admin\API\Trash;

use App\Http\Controllers\Admin\API\ApiTrashController;
use App\Http\Controllers\Controller;
use App\Models\ImageService;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends ApiTrashController
{
    public $model = Service::class;

    public function deleteImg(string $id){
        $imgService = ImageService::query()
            ->where('service_id',$id)
            ->get();
        foreach ($imgService as $item){
            $item->delete();
        }
        return back();
    }
}
