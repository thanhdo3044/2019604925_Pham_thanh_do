<?php

namespace App\Http\Controllers\Admin\API\Trash;

use App\Http\Controllers\Admin\API\ApiTrashController;
use App\Http\Controllers\Controller;
use App\Models\Service_categories;
use Illuminate\Http\Request;

class CategoryController extends ApiTrashController
{
    public $model = Service_categories::class;
}
