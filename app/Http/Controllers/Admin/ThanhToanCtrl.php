<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ThanhToanCtrl extends Controller
{
    public $model = payment::class;
    public $route = 'payment';
    public $pathViews = 'admin.payment';
    public $columns = [
        'booking_id' => 'Booking ID',
        'money' => 'Số tiền',
        'email' => 'Email',
        'note' => 'Chi tiết',
        'vnp_response_code' => 'Trạng thái',
        'code_vnpay' => 'Mã giao dịch',
        'code_bank' => 'Ngân hàng',
        'time' => 'Thời gian chuyển khoản'
    ];


    /**
     * Display a listing of the resource.
     * @throws BindingResolutionException
     */




     public function __construct()
     {
         if (class_exists($this->model)) {
             $this->model = app()->make($this->model);
         } else {
             $this->model = null;
         }
     }

    public function index(Request $request) {
        if ($this->model !== null) {
            $data = $this->model->paginate();
        } else {
            $data = [];
        }
        if ($request->post() && $request->searchPayment) {
            $tableName = 'payment'; // Tên của bảng bạn đang tìm kiếm

            // Lấy danh sách tên cột trong bảng
            $columns = Schema::getColumnListing($tableName);

            $query = DB::table($tableName);

            foreach ($columns as $column) {
                $query->orWhere($column, 'like', '%' . $request->searchPayment . '%');
            }

            $data = $query->get();
        }
        return view($this->pathViews . '.' . __FUNCTION__, compact('data'))
            ->with('columns', $this->columns);
    }
}
