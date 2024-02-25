<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\WorkDay;
use Illuminate\Http\Request;

class wordDaysController extends AdminBaseController
{
    public $model = WorkDay::class;
    public $pathViews = 'admin.word_days';
    public $route = 'workDay';
    public $columns = [
        'day' => 'Day',
        'is_active' => 'Is_active',
    ];
    public function delete($id)
    {
        $model = WorkDay::findOrFail($id);
        $model->delete();
        return redirect()->route('workDay.index');
    }
}
