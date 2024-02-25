<?php

use App\Http\Controllers\Admin\API\APIBookingController;
use App\Http\Controllers\Admin\API\ApiCategoryController;
use App\Http\Controllers\Admin\API\ApiStylistController;
use App\Http\Controllers\Admin\API\ApiRoleController;
use App\Http\Controllers\Admin\API\ApiStylistTimeSheetsController;
use App\Http\Controllers\Admin\API\ApiUserController;


use App\Http\Controllers\Admin\API\ApiServiceController;

use App\Http\Controllers\Admin\API\ApiTrashController;
use App\Http\Controllers\Admin\API\StylistPermissionController;
use App\Http\Controllers\Admin\API\Trash\CategoryController;
use App\Http\Controllers\Admin\API\Trash\ServiceController;
use App\Http\Controllers\Admin\API\ApiDashboardController;
use App\Http\Controllers\Client\API\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([],function (){
    Route::get('get/service',[ApiServiceController::class, 'index']);
    Route::post('post/service',[ApiServiceController::class, 'store']);
    Route::get('edit/service/{id}',[ApiServiceController::class, 'show']);
    Route::post('put/service/{id}',[ApiServiceController::class, 'update']);
    Route::delete('delete/service/{id}',[ApiServiceController::class, 'destroy']);
//    Route::get('put/service/{id}',[ApiServiceController::class, 'update']);
    Route::get('getImg/{id}', [ApiServiceController::class, 'getImage']);

    Route::get('get/stylistTimeSheets',[ApiStylistTimeSheetsController::class, 'index']);
    Route::get('get/getvalue',[ApiStylistTimeSheetsController::class, 'getvalue']);
    Route::match(['GET','POST'],'post/stylistTimeSheets',[ApiStylistTimeSheetsController::class, 'store']);
    Route::get('edit/stylistTimeSheets/{id}',[ApiStylistTimeSheetsController::class, 'show']);
    Route::post('put/stylistTimeSheets/{id}',[ApiStylistTimeSheetsController::class, 'update']);
    Route::delete('delete/stylistTimeSheets/{id}',[ApiStylistTimeSheetsController::class, 'destroyAll']);
    Route::post('deleteDetail/stylistTimeSheets',[ApiStylistTimeSheetsController::class, 'destroy']);

    Route::get('roleUser',[ApiUserController::class, 'roles']);
//    Route::get('getPermission',[StylistPermissionController::class, 'getPermissions']);

    Route::get('roles',[ApiRoleController::class, 'index']);
    Route::get('roles/overView',[ApiRoleController::class, 'overView']);
    Route::post('AddRoles',[ApiRoleController::class, 'store']);
    Route::get('getRoleDetail/{id}',[ApiRoleController::class, 'edit']);
    Route::post('updateRole/{id}',[ApiRoleController::class, 'update']);
    Route::delete('destroyRole/{id}',[ApiRoleController::class, 'destroy']);
});

Route::group([],function (){
    Route::get('get/booking',[ApiBookingController::class, 'index']);
//    Route::post('post/booking',[ApiBookingController::class, 'store']);
//    Route::get('edit/booking/{id}',[ApiBookingController::class, 'show']);
});

Route::resource('category', ApiCategoryController::class);
Route::resource('stylist', ApiStylistController::class);
Route::post('stylist/put/{id}', [ApiStylistController::class, 'update']);
Route::resource('stylistTimeSheets', ApiStylistTimeSheetsController::class);
Route::resource('user', ApiUserController::class);

Route::prefix('trash')->group(function (){
    Route::get('category', [ApiTrashController::class, 'category']);
    Route::post('category/{id}', [ApiTrashController::class, 'restore']);
    Route::Delete('category/{id}', [ApiTrashController::class, 'destroy']);
    Route::get('stylistTimeSheets', [ApiTrashController::class, 'stylistTimeSheets']);
    Route::post('stylistTimeSheets/{id}', [ApiTrashController::class, 'restoreSTSs']);
    Route::Delete('stylistTimeSheets/{id}', [ApiTrashController::class, 'destroySTSs']);
    Route::get('user', [ApiTrashController::class, 'user']);
    Route::post('user/{id}', [ApiTrashController::class, 'restoreUser']);
    Route::Delete('user/{id}', [ApiTrashController::class, 'destroyUser']);

    Route::get('category', [CategoryController::class, 'index']);
    Route::post('category/{id}', [CategoryController::class, 'restore']);
    Route::Delete('category/{id}', [CategoryController::class, 'destroy']);

    Route::get('service', [ServiceController::class, 'index']);
    Route::post('service/{id}', [ServiceController::class, 'restore']);
    Route::Delete('service/{id}', [ServiceController::class, 'destroy']);
    Route::get('deleteImg/{id}', [ServiceController::class, 'deleteImg']);
});


Route::group([],function (){
    Route::get('getUserPhone/booking', [BookingController::class, 'getUserPhone']);
    Route::post('setUserPhone/booking', [BookingController::class, 'setUserPhone']);
    Route::get('list/stylist/booking', [BookingController::class, 'index']);
    Route::get('timeSheet/booking/{id}', [BookingController::class, 'timeSheetDetail']);
    // Route::get('timeSheet/booking', [BookingController::class, 'timeSheetDetail']);
    Route::get('stylistDetail/booking/{id}', [BookingController::class, 'stylistDetail']);

    Route::get('service/booking', [BookingController::class, 'loadService']);
    Route::post('pullRequest/booking', [BookingController::class, 'pullRequest']);
    Route::post('updateRequest/booking/{id}', [BookingController::class, 'updateRequest']);

    Route::get('booking/success/{id}', [BookingController::class, 'bookingDone']);
    Route::get('booking/destroy/{id}', [BookingController::class, 'bookingDestroy']);

    Route::get('booking/success', [BookingController::class, 'bookingDone']);
    Route::get('booking/randomStylist', [BookingController::class, 'randomStylist']);

    Route::get('booking/notification/{id}', [BookingController::class, 'bookingNotification']);
    Route::get('date/booking', [BookingController::class, 'bookingDate']);
    Route::post('workDay/booking', [BookingController::class, 'blockWorkDay']);
});
Route::get('/dailySales', [ApiDashboardController::class, 'dailySales']);
Route::get('/dataSixMonths', [ApiDashboardController::class, 'dataSixMonths']);
Route::get('/monthlyRevenue', [ApiDashboardController::class, 'monthlyRevenue']);
Route::get('/latestStylist', [ApiDashboardController::class, 'latestStylist']);
Route::get('/latestBooking', [ApiDashboardController::class, 'latestBooking']);

Route::group([],function (){
    Route::get('service/booking_blade', [\App\Http\Controllers\Admin\BookingController::class, 'loadService']);
});

