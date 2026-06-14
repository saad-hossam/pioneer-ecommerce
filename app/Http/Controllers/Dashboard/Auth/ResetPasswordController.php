<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ResetPasswordController extends Controller
{
 // Show reset form
    public function showResetForm($token, Request $request)
    {
        return view('dashboard.auth.password.reset', [
            'token' => $token,
            'email' => $request->email ?? ''
        ]);
    }

    // Handle reset password
   public function reset(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email|exists:admins,email',
        'password' => 'required|min:6|confirmed',
    ]);

    $admin = Admin::where('email', $request->email)->first();

    if (!$admin) {
        return back()->withErrors(['email' => 'Admin not found']);
    }

    $admin->update([
        'password' => Hash::make($request->password),
        'remember_token' => Str::random(60),
    ]);

    return redirect()->route('dashboard.login')->with('success', 'Password reset successfully');
}
}
