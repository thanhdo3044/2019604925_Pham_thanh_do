<?php


use App\Http\Controllers\Admin\BannerSettingCtl;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\CategoryServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\resultsController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StatisticalController;
use App\Http\Controllers\Admin\StylistTimeSheetsController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\API\ApiStylistController;
use App\Http\Controllers\Admin\destroyBookingCtrl;
use App\Http\Controllers\Admin\StylistController;
use App\Http\Controllers\Admin\ThanhToanCtrl;
use App\Http\Controllers\Admin\wordDaysController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BannerController;

use App\Http\Controllers\FaqController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PricingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Lộc tạo middleware cho admin có quyền admin mới có thể truy cập
Route::middleware(['admin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('route.dashboard');

    Route::get('booking-statistics', [BookingController::class, 'getBookingStatistics'])->name('booking.statistics');

    Route::resource('category', CategoryServiceController::class);
    Route::resource('stylist', StylistController::class);
    Route::resource('timesheets', TimesheetController::class);
    Route::get('/admin/timesheets/{id}/delete', [TimeSheetController::class,'delete'])->name('timesheets.delete');
    Route::match(['GET', 'POST'],'/admin/timesheets/{id}/edit', [TimeSheetController::class, 'edit'])->name('timesheets.edit');
    //setting
    Route::resource('settings', SettingController::class);
    Route::get('/admin/settings/{id}/delete', [SettingController::class,'delete'])->name('settings.delete');
    Route::match(['GET', 'POST'],'/admin/settings/{id}/edit', [SettingController::class, 'edit'])->name('settings.edit');
    //banner
    Route::resource('banners', BannerController::class)->withTrashed();
    Route::get('/admin/banners/{id}/delete', [BannerController::class,'delete'])->name('banners.delete');
    Route::match(['GET', 'POST'],'/admin/banners/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');

    Route::resource('stylistTimeSheets', StylistTimeSheetsController::class);
    Route::resource('user', UserController::class);
    //payment
    Route::resource('payment',ThanhToanCtrl::class);
    Route::post('searchPayment', [ThanhToanCtrl::class, 'index'])->name('searchPayment');


    Route::resource('member', MemberController::class);
    Route::resource('timesheet', TimeSheetController::class);
    Route::get('service', [ServiceController::class, 'index'])->name('route.service');
    Route::get('calendar', [CalendarController::class, 'index'])->name('route.calendar');
    Route::get('chat', [ChatController::class, 'index'])->name('route.chat');
    Route::get('user', [UserController::class, 'index'])->name('route.user');


    Route::get('stylistTimeSheets', [StylistTimeSheetsController::class, 'index'])->name('route.stylistTimeSheets');
    Route::get('statistical', [StatisticalController::class, 'statistical'])->name('route.statistical');
    Route::get('statistical/service', [StatisticalController::class, 'service'])->name('route.statistical.service');
    Route::get('statistical/revenue', [StatisticalController::class, 'revenue'])->name('route.statistical.revenue');

    Route::get('result', [resultsController::class, 'result'])->name('route.result');
    Route::resource('banner', BannerSettingCtl::class);
    Route::delete('checkDelete', [BannerSettingCtl::class, 'checkDelete'])->name('checkDelete');
    // Route::resource('review', ReviewController::class);


    Route::get('destroyBooking',[destroyBookingCtrl::class, 'index'])->name('destroy.index');
    Route::match(['GET', 'POST'],'confirm-destroyBooking/{id}',[destroyBookingCtrl::class, 'confirm'])->name('confirm');
    Route::match(['GET', 'POST'],'restore-destroyBooking/{id}',[destroyBookingCtrl::class, 'restore'])->name('restore');

    Route::resource('workDay', wordDaysController::class);
    Route::match(['GET', 'POST'], 'destroy-workday/{id}',[wordDaysController::class, 'delete'])->name('workday.delete');
    Route::match(['GET', 'POST'], 'edit-workday/{id}',[wordDaysController::class, 'edit'])->name('workday.edit');
    Route::match(['GET', 'POST'], 'update-workday/{id}',[wordDaysController::class, 'update'])->name('workday.update');

    Route::get('adminReview',[ReviewController::class, 'admin'])->name('review.index');
    Route::match(['GET', 'POST'], 'reply', [ReviewController::class, 'reply'])->name('replyReview');

    Route::match(['GET', 'POST'], 'destroy/{id}', [BannerSettingCtl::class, 'delete'])->name('destroy.banner');
    Route::match(['GET', 'POST'], 'edit/{id}', [BannerSettingCtl::class, 'edit'])->name('edit.banner');
    Route::post('searchBanner', [BannerSettingCtl::class, 'index'])->name('searchBanner');



    Route::prefix('trash')->group(function (){
        Route::get('category', [TrashController::class, 'category'])->name('trash.category');
        Route::get('user', [TrashController::class, 'user'])->name('trash.user');


        Route::get('service', [TrashController::class, 'Service'])->name('trash.service');
    });

    Route::get('booking_blade/index', [BookingController::class, 'index' ])->name('route.booking_blade');
    Route::get('booking_blade/detail/{id}', [BookingController::class, 'getDetail' ])->name('route.booking_blade.detail');
    Route::post('booking_blade/detail/post/{id}',[BookingController::class,'update'])->name('booking_blade.detail.post');
    Route::post('booking_blade/post/{id}', [BookingController::class, 'hoanThanhCat'])->name('route.booking_blade.post');
    Route::get('booking_blade/api/detail/{id}', [BookingController::class, 'getDetailAPI' ])->name('route.booking_blade.api.detail');
    Route::delete('booking_blade/xoa-dich-vu-booking/{bookingId}/{serviceId}', [BookingController::class, 'xoaDichVuBooking'])->name('booking.xoaDichVu');
    Route::post('booking_blade/luu-dich-vu-booking', [BookingController::class, 'luuDichVuBooking'])->name('booking.luuDichVu');

    Route::resource('stylists',StylistController::class);
    Route::resource('portfolios',PortfolioController::class);
    Route::resource('faqs',FaqController::class);
    Route::resource('blogs',BlogController::class);
    Route::resource('pricings',PricingController::class);
    Route::delete('deleteMultipleStylists', 'StylistController@deleteMultiple')->name('deleteMultipleStylists');

    Route::group([],function (){
        Route::get('roles', [RoleController::class, 'index' ])->name('role');
    });
});









