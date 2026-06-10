<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }

   public function login(AdminRequest $request)
{
    if (Auth::guard('admin')->attempt([
        'email' => $request->email,
        'password' => $request->password,
    ])) {

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard.welcome'));
    }

    return back()->withErrors([
        'email' => __('auth.failed'),
    ]);
}
}
