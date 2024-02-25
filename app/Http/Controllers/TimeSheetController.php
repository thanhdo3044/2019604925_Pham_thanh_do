<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timesheet;

class TimeSheetController extends Controller
{
    public function index()
    {
        
        $timesheets = Timesheet::all();
       
        return view('admin.timesheets.index', compact('timesheets'));
    }

    public function create()
    {
        return view('admin.timesheets.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'hour' => 'required|integer|min:0',
        'minutes' => 'required|integer|min:0',
        'is_active' => 'boolean',
    ]);
    Timesheet::create([
        'hour' => $request->input('hour'),
        'minutes' => $request->input('minutes'),   
        
        'is_active' => $request->is_active,
    ]);
    session()->flash('success', 'Thêm mới thành công');

    return redirect()->route('timesheets.index');
}


public function edit(Request $request, $id)
{
    $timesheet = Timesheet::findOrFail($id);
    return view('admin.timesheets.edit', compact('timesheet'));
}
public function update(Request $request, $id){
    $timesheet = Timesheet::findOrFail($id);

    $request->validate([
        'hour' => 'required|integer|min:0',
        'minutes' => 'required|integer|min:0',
        'is_active' => 'boolean',
    ]);

    $timesheet->update([
        'hour' => $request->input('hour'),
        'minutes' => $request->input('minutes'),
        'is_active' => $request->is_active,
    ]);
    session()->flash('success', 'Cập nhật thành công');

    return redirect()->route('timesheets.index');
}


    public function delete($id)
{
    $timesheet = Timesheet::findOrFail($id);
    $timesheet->delete();
    session()->flash('success', 'Xóa thành công');

    return redirect()->route('timesheets.index');
    // return redirect()->route('admin.timesheets.index')->with('success', 'Timesheet deleted successfully');
}
public function deleteAll(Request $request){
    $ids = $request->ids;
    Timesheet::whereIn('id',$ids)->delete();
    return response()->json(["success"=> "Timesheet have been delete"]);
}
}
