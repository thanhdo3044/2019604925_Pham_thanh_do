<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function login()
    {
        return view('auth.login');
    }

    public function otp()
    {
        return view('auth.otp');
    }

    /**
     * Handle an incoming authentication request.
     */
//$request->authenticate();

    public function storeLogin(Request  $request)
    {
        // Lấy thông tin từ request (số điện thoại)
        $phoneNumber = $request->input('phone_number');
        // Kiểm tra xem số điện thoại đã tồn tại trong cơ sở dữ liệu chưa
        $existingUser = User::where('phone_number', $phoneNumber)->first();

        if (!$existingUser) {
            $user = new User();
            $user->phone_number = $phoneNumber;
            $user->save();
            $request->session()->regenerate();
            Auth::login($user);
        } else {
            $request->session()->regenerate();
            Auth::login($existingUser);
//            $this->sendSms($phoneNumber);
        }

        $userRole = Auth::user()->user_type;
        // Thực hiện chuyển hướng dựa trên quyền
        if ($userRole === RouteServiceProvider::HOME_ADMIN) {
            return response()->json(['user_type' => RouteServiceProvider::HOME_ADMIN]);
        } elseif ($userRole === RouteServiceProvider::HOME_STYLIST) {
            return response()->json(['user_type' => RouteServiceProvider::HOME_STYLIST]);
        }else{
            return response()->json(['user_type' => RouteServiceProvider::HOME_USER]);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
