<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AuthController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('guest:admin', only: ['showLoginForm', 'login']),
        ];
    }



    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }

   public function login(AdminRequest $request)
{
    if (Auth::guard('admin')->attempt([
        'email' => $request->email,
        'password' => $request->password,
    ],true)) {

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard.welcome'));
    }

    return back()->withErrors([
        'email' => __('auth.failed'),
    ]);
}

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('dashboard.login');
    }
}
