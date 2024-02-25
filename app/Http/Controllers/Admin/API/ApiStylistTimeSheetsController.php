<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\StylistTimeSheet;
use App\Models\Stylist;
use App\Models\Timesheet;
use App\Models\User;
use App\Models\WorkDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApiStylistTimeSheetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::query()->where('user_type', 'STYLIST')->with('timeSheet', 'workDay')->get();
    //     $data = StylistTimeSheet::query()
    // ->whereHas('stylist', function ($query) {
    //     $query->where('user_type', 'STYLIST');
    // })
    // ->with(['stylist', 'workDay'])
    // ->distinct('user_id', 'work_day_id')
    // ->get();

        $timeSheet = StylistTimeSheet::all();


        // $data = WorkDay::query()->with('timeSheet','stylist')->get();
        // return response()->json([$data, $day]);
        return response()->json(['data'=>$data,'timeSheet'=>$timeSheet]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $time = $request->input('timesheet_id');
//        Log::info($time);
        foreach ($time as $value) {
            // Tìm kiếm bản ghi với timesheet_id và user_id tương ứng
            // $existingRecord = StylistTimeSheet::where('timesheet_id', $value)
            //     ->where('user_id', $request->input('user_id'))
            //     ->first();

            // Nếu bản ghi đã tồn tại, cập nhật nó
            // if ($existingRecord) {
            //     $existingRecord->update([
            //         'user_id' => $request->input('user_id'),
            //         'timesheet_id' => $value,
            //         'work_day_id' => $request->input('work_day_id'),
            //         'is_active' => $request->input('is_active'),
            //         'is_block' => $request->input('is_block'),
            //     ]);
            // } else {
                // Nếu không, tạo mới bản ghi
                StylistTimeSheet::create([
                    'user_id' => $request->input('user_id'),
                    'timesheet_id' => $value,
                    'work_day_id' => $request->input('work_day_id'),
                    'is_active' => $request->input('is_active'),
                    'is_block' => $request->input('is_block'),
                ]);
            // }
        }

        return response()->json(['success','Created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Stylist = User::query()->where('user_type','STYLIST')->get();

        $dataStylist = User::query()->where('id', $id)->with('timeSheet')->get();

        $dataTimeSheet = Timesheet::all();
        $dataWorkDay = WorkDay::all();

        return response()->json(['stylist' => $Stylist,
                                 'dataStylist'=>$dataStylist,
                                 'dataTimeSheet'=>$dataTimeSheet,
                                 'dataWorkDay'=>$dataWorkDay]);
    }
    public function getvalue()
    {
        $dataStylist = User::query()->where('user_type', 'STYLIST')->get();
        $dataTimeSheet = Timesheet::all();
        $dataWorkDay = WorkDay::all();

        return response()->json(['dataStylist'=>$dataStylist, 'dataTimeSheet'=>$dataTimeSheet,'dataWorkDay'=>$dataWorkDay]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $timeSheet = $request->input('timesheet_id');
            foreach ($timeSheet as $key => $value){
                StylistTimeSheet::query()->updateOrCreate([
                    'user_id' => $request->input('user_id'),
                    'timesheet_id' => $value,
                    'is_active' => $request->input('is_active'),
                    'is_block' => $request->input('is_block'),
                ]);
            }
            StylistTimeSheet::query()
                ->where('user_id', $id)
                ->whereNotIn('timesheet_id', array_values($timeSheet))
                ->delete();
            return response()->json(['success'=>'Cập nhật thành công']);
        }catch (\Exception $e){

            return response()->json(['success'=>'Không thể cập nhật!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyAll(string $id)
    {
        StylistTimeSheet::query()
            ->where('user_id', $id)
            ->delete();
        return response()->json(['success','Moved successfully']);
    }
    public function destroy(Request $request)
    {
//        dd($request->all());
        $userId = $request->user_id;
        $timesheetId = $request->timesheet_id;
        StylistTimeSheet::query()
            ->where('user_id' ,$userId)
            ->where('timesheet_id' ,$timesheetId)
            ->delete();
        return response()->json(['success','Moved successfully']);
    }
}
