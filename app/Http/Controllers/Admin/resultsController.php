<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminBaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Results;
use App\Models\Booking;

use Illuminate\Http\Request;

class resultsController extends AdminBaseController
{
    //
    public $model = Results::class;
    public $pathViews = 'admin.results';
    public $columns = [
        'booking_id' => 'STT',
        'image' => 'image',
    ];

    public function result(Request $request)
    {

        $data = $this->model->paginate();

        $data = Results::all();

        return view($this->pathViews . '.' . 'index', compact('data'))->with('columns', $this->columns);
    }
}
