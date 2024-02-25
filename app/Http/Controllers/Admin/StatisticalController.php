<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\Booking_service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Results;
use Illuminate\Http\Request;

class StatisticalController extends AdminBaseController
{
    public $route = 'statistical';
    public $pathViews = 'admin.statistical.index';
    public function statistical( Request $request )
    {
        // $bookedBooking = Results::distinct('booking_id')->count();
        $bookedBooking = Booking::where('status',3)->count();
        $notBookedBooking = Booking::where('status',2)->count();
        $cancelledBooking = Booking::where('status',0)->count();
        $totalBooking = $bookedBooking + $notBookedBooking + $cancelledBooking;
        $totalPrice = Booking::where('status',3)->sum('price');


        $today = now()->format('Y-m-d');
        // $todayCompletedCounts = Results::distinct('booking_id')->whereDate('created_at', $today)->count();
        $todayCompletedCounts = Booking::where('status','3')->whereDate('created_at', $today)->count();
        $todayPendingCounts = Booking::where('status','2')->whereDate('created_at', $today)->count();
        $todayCanceledCounts = Booking::where('status','0')->whereDate('created_at', $today)->count();
        $todayTotalPrice = Booking::where('status',3)->whereDate('created_at', $today)->sum('price');


        $yesterday = Carbon::yesterday()->format('Y-m-d');
        // $yesterdayCompletedCounts = Results::distinct('booking_id')->whereDate('created_at', $yesterday)->count();
        $yesterdayCompletedCounts = Booking::where('status','3')->whereDate('created_at', $yesterday)->count();
        $yesterdayPendingCounts = Booking::where('status','2')->whereDate('created_at', $yesterday)->count();
        $yesterdayCanceledCounts = Booking::where('status','0')->whereDate('created_at', $yesterday)->count();
        $yesterdayTotalPrice = Booking::where('status',3)->whereDate('created_at', $yesterday)->sum('price');



        $startOfMonth = now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = now()->endOfMonth()->format('Y-m-d');
        $thisMonthTotalPrice = Booking::where('status',3)->whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('price');


        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d');
        $lastMonthTotalPrice = Booking::where('status',3)->whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->sum('price');



        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $chartBooking = Booking::select(
            DB::raw('DATE(created_at) as order_date'),
            DB::raw('COUNT(CASE WHEN status = 3 THEN 1 END) as completed_total'),
            DB::raw('COUNT(CASE WHEN status = 2 THEN 1 END) as pending_total'),
            DB::raw('COUNT(CASE WHEN status = 0 THEN 1 END) as canceled_total')
        )
        ->groupBy('order_date')
        ->orderBy('order_date', 'asc')
        ->get();

        $startOfWeek = now()->startOfWeek()->format('Y-m-d');
        $endOfWeek = now()->endOfWeek()->format('Y-m-d');

        $chart7DaysBooking = Booking::select(
            DB::raw('DATE(created_at) as order_date'),
            DB::raw('COUNT(CASE WHEN status = 3 THEN 1 END) as completed_total'),
            DB::raw('COUNT(CASE WHEN status = 2 THEN 1 END) as pending_total'),
            DB::raw('COUNT(CASE WHEN status = 0 THEN 1 END) as canceled_total')
        )
        ->whereBetween(DB::raw('DATE(created_at)'), [$startOfWeek, $endOfWeek])
        ->groupBy('order_date')
        ->orderBy('order_date', 'asc')
        ->get();

        $orderSummary = Booking::select(
            DB::raw('DATE(created_at) as order_date'),
            DB::raw('COUNT(CASE WHEN status = 3 THEN 1 END) as completed_total'),
            DB::raw('COUNT(CASE WHEN status = 2 THEN 1 END) as pending_total'),
            DB::raw('COUNT(CASE WHEN status = 0 THEN 1 END) as canceled_total'),
            DB::raw('COUNT(CASE WHEN status = 3 OR status = 2 OR status = 0 THEN 1 END) as booked_total'),
            DB::raw('SUM(CASE WHEN status = 3 THEN price ELSE 0 END) as daily_revenue')
        )
        ->groupBy('order_date')
        ->orderBy('order_date', 'desc')
        //->limit(5)
        ->get();

        return view($this->pathViews,
                    compact('totalBooking', 'bookedBooking', 'notBookedBooking', 'cancelledBooking',
                            'totalPrice','orderSummary','chartBooking','chart7DaysBooking',
                            'startOfMonth','endOfMonth','thisMonthTotalPrice',
                            'startOfLastMonth','endOfLastMonth','lastMonthTotalPrice',
                            'today','todayCompletedCounts','todayPendingCounts','todayCanceledCounts','todayTotalPrice',
                            'yesterday','yesterdayCompletedCounts','yesterdayPendingCounts','yesterdayCanceledCounts','yesterdayTotalPrice',));
    }
    public function service(){
        $duplicateServices = Booking_Service::query()
            ->select('service_id', \DB::raw('COUNT(service_id) AS total_occurrences'))
            ->whereMonth('created_at', '=', now()->month) // Chỉ lấy dữ liệu của tháng hiện tại
            ->groupBy('service_id')
            ->havingRaw('COUNT(service_id) > 1')
            ->orderByDesc('total_occurrences')
            ->with('service:id,name,description,price')
            ->get();

        $totalPrices = [];
        // Sắp xếp theo tổng giá giảm dần
        $duplicateServices = $duplicateServices->sortByDesc(function ($item) {
            return $item->service->price * $item->total_occurrences;
        });

// Lấy ra 5 dòng đầu tiên
        $duplicateServices = $duplicateServices->take(5);
        foreach ($duplicateServices as $duplicateService) {
            $service = $duplicateService->service;
            $totalPrice = $service->price * $duplicateService->total_occurrences;

            $totalPrices[] = [
                'total_price' => $totalPrice,
                'name' => $service->name,
                'description' => $service->description,
            ];
        }
        // $totalPrice là biến lưu giá trị của các doanh số
        $totalOccurrences = $duplicateServices
            ->sortByDesc('total_occurrences')
            ->take(5)
            ->map(function ($duplicateService) {
                $service = $duplicateService->service;
                return [
                    'total_occurrences' => $duplicateService->total_occurrences,
                    'name' => $service->name,
                    'description' => $service->description,
                ];
            });
        // $totalOccurrences là biến lưu số lượng được đặt của các dịch vụ
//        dd($totalOccurrences);


        // Lấy tổng tiền đặt lịch theo tháng (Đặt Lịch)
        $revenueByMonth = Booking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(price) as total')
        )
            ->whereYear('created_at', '=', date('Y'))
            ->where('status', 3)
            ->whereIn(DB::raw('MONTH(created_at)'), [date('n'), date('n') - 1])
            ->groupBy('month')
            ->orderBy('month')
            ->get();
//        dd($revenueByMonth);
// Tính phần trăm tăng giảm (nếu có ít nhất hai tháng dữ liệu
        $percentChange = [];
        $count = count($revenueByMonth);
        if ($count >= 2) {
            for ($i = 1; $i < $count; $i++) {
                $currentMonth = $revenueByMonth[$i]->total;
                $prevMonth = $revenueByMonth[$i - 1]->total;

                // Kiểm tra trước khi tính phần trăm
                if ($prevMonth != 0) {
                    $percentage = (($currentMonth - $prevMonth) / $prevMonth) * 100;
                } else {
                    // Trường hợp giá trị của tháng trước đó là 0
                    $percentage = ($currentMonth != 0) ? 100 : 0; // Phần trăm tăng so với 0 hoặc giảm từ 0
                }

                $percentChange[] = [
                    'month' => $revenueByMonth[$i]->month,
                    'percentage' => $percentage,
                    'currentMonth' => $currentMonth,
                    'prevMonth' => $prevMonth,
                ];
            }
        } else {
            // Trường hợp không có đủ dữ liệu cho việc tính phần trăm
            // Đặt giá trị mặc định cho phần trăm là 0
            $percentChange[] = [
                'month' => 0,
                'percentage' => 0,
                'currentMonth' => 0,
                'prevMonth' => 0,
            ];
        }

        // Tạo mảng kết quả với các tháng và giá trị mặc định là null
        $resultByMonth = array_fill_keys(range(1, 12), ['month' => 0, 'total' => 0]);

        foreach ($revenueByMonth as $item) {
            $resultByMonth[$item['month']] = [
                'month' => $item['month'],
                'total' => $item['total'],
            ];
        }
// Bây giờ $resultByMonth chứa dữ liệu của tất cả các tháng, thậm chí cả tháng không có dữ liệu.

// Truy xuất dữ liệu từ biến $resultByMonth
        $revenueCurrentMonth = $resultByMonth[date('n')];
        $revenueLastMonth = $resultByMonth[date('n') - 1];

// Bảo đảm rằng cả hai biến đều là mảng
        $revenueCurrentMonth = $revenueCurrentMonth ?? ['month' => 0, 'total' => 0];
        $revenueLastMonth = $revenueLastMonth ?? ['month' => 0, 'total' => 0];


//        dd($percentChange);
        // Khách hàng tiềm năng được tạo ra
        $userCounts = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', '=', date('Y'))
            ->whereIn(DB::raw('MONTH(created_at)'), [Carbon::now()->month, Carbon::now()->subMonth()->month])
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $currentMonthData = collect($userCounts)->firstWhere('month', Carbon::now()->month);
        $lastMonthData = collect($userCounts)->firstWhere('month', Carbon::now()->subMonth()->month);

        if ($currentMonthData === null) {
            $currentMonthData = ['month' => Carbon::now()->month, 'count' => 0];
        }

        if ($lastMonthData === null) {
            $lastMonthData = ['month' => Carbon::now()->subMonth()->month, 'count' => 0];
        }
//        dd($userCounts);
        $percentChangeUser = 0;
        if ($userCounts->isNotEmpty() && $lastMonthData['count'] !== 0) {
//            dd(123);
            $percentChangeUser = (($currentMonthData['count'] - $lastMonthData['count']) / $lastMonthData['count']) * 100;
        }else{
            $percentChangeUser = 0.00;
        }
//        dd($totalPrices);
        return view('admin.statistical.service',
            compact('totalPrices','totalOccurrences'
                ,'percentChange','userCounts','percentChangeUser',
                'revenueCurrentMonth','revenueLastMonth','currentMonthData','lastMonthData'));
    }

    public function revenue(){

        // Tạo một mảng với giá trị mặc định cho tất cả các tháng trong năm
        $monthsInYear = range(1, 12);
        $revenueByYear = array_fill_keys($monthsInYear, ['month' => 0, 'total' => 0]);

// Truy vấn thu nhập của tất cả các tháng trong năm
        $actualRevenue = Booking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(price) as total')
        )
            ->whereYear('created_at', '=', date('Y'))
            ->where('status', 3)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

// Ghi đè giá trị trong mảng với dữ liệu thực tế
        foreach ($actualRevenue as $item) {
            $revenueByYear[$item['month']] = $item;
        }
        // ---------------------------------------------------------------------------------------

        // Lấy tổng tiền đặt lịch theo tháng (Đặt Lịch)
        $revenueByMonth = Booking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(price) as total')
        )
            ->whereYear('created_at', '=', date('Y'))
            ->where('status', 3)
            ->whereIn(DB::raw('MONTH(created_at)'), [date('n'), date('n') - 1])
            ->groupBy('month')
            ->orderBy('month')
            ->get();
//        dd($revenueByMonth);
// Tính Trung bình
        $totalRevenue = 0;
        $monthCount = count($revenueByMonth);

        foreach ($revenueByMonth as $month) {
            $totalRevenue += $month->total;
        }

        $averageRevenue = $monthCount > 0 ? $totalRevenue / $monthCount : 0;
//        dd($percentChange);
        // Tạo mảng kết quả với các tháng và giá trị mặc định là null
        $resultByMonth = array_fill_keys(range(1, 12), ['month' => 0, 'total' => 0]);
        foreach ($revenueByMonth as $item) {
            $resultByMonth[$item['month']] = [
                'month' => $item['month'],
                'total' => $item['total'],
            ];
        }
// Truy xuất dữ liệu từ biến $resultByMonth
        $revenueCurrentMonth = $resultByMonth[date('n')];
        $revenueLastMonth = $resultByMonth[date('n') - 1];

// Bảo đảm rằng cả hai biến đều là mảng
        $revenueCurrentMonth = $revenueCurrentMonth ?? ['month' => 0, 'total' => 0];
        $revenueLastMonth = $revenueLastMonth ?? ['month' => 0, 'total' => 0];
        $expenseCurrentMonth = 600000;
        $expenseLastMonth = 500000;
        $profitCurrentMonth = $revenueCurrentMonth['total'] - $expenseCurrentMonth;
        $profitLastMonth = $revenueLastMonth['total'] - $expenseLastMonth;

        //-------------------------------------------------------------------------
        // tính %
        $percentChange = [];
        $count = count($revenueByMonth);
        if ($count >= 2) {
            for ($i = 1; $i < $count; $i++) {
                $currentMonth = $revenueByMonth[$i]->total;
                $prevMonth = $revenueByMonth[$i - 1]->total;

                // Kiểm tra trước khi tính phần trăm
                if ($prevMonth != 0) {
                    $percentage = (($currentMonth - $prevMonth) / $prevMonth) * 100;
                } else {
                    // Trường hợp giá trị của tháng trước đó là 0
                    $percentage = ($currentMonth != 0) ? 100 : 0; // Phần trăm tăng so với 0 hoặc giảm từ 0
                }

                $percentChange[] = [
                    'month' => $revenueByMonth[$i]->month,
                    'percentage' => $percentage,
                    'currentMonth' => $currentMonth,
                    'prevMonth' => $prevMonth,
                ];
            }
        } else {
            // Trường hợp không có đủ dữ liệu cho việc tính phần trăm
            // Đặt giá trị mặc định cho phần trăm là 0
            $percentChange[] = [
                'month' => 0,
                'percentage' => 0,
                'currentMonth' => 0,
                'prevMonth' => 0,
            ];
        }

        $previousYearRevenue = Booking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(price) as total')
        )
            ->whereYear('created_at', '=', date('Y') - 1) // Thay đổi năm để lấy từ năm trước
            ->where('status', 3)
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $lastYear = array_fill_keys(range(1, 12), ['month' => 0, 'total' => 0]);
        foreach ($previousYearRevenue as $item) {
            $lastYear[$item['month']] = [
                'month' => $item['month'],
                'total' => $item['total'],
            ];
        }
//        dd($resultlastYear);
        return view('admin.statistical.revenue',
            compact('revenueByYear','averageRevenue',
            'revenueCurrentMonth','revenueLastMonth','expenseCurrentMonth',
            'expenseLastMonth','profitCurrentMonth','profitLastMonth','percentChange',
            'lastYear'));
    }
}
