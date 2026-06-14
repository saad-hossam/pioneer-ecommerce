<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Notifications\SendOtpNotify;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{

public $opt2;
public function __construct(){
$this->opt2=new Otp;
}

    public function showEmailForm()
    {
        return view('dashboard.auth.password.email');
    }

public function sendOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $admin = Admin::where('email', $request->email)->first();

    if (!$admin) {
        return back()->withErrors([
            'email' => 'Email address not found.'
        ]);
    }

    $admin->notify(new SendOtpNotify());

    return redirect()->route(
        'dashboard.password.showOtpForm',
        ['email' => $admin->email]
    );
}
    public function showOtpForm($email)
    {
        // return $email;
        return view('dashboard.auth.password.confirm',['email'=>$email]);
    }

public function verifyOtp(Request $request)
{
    $request->validate([
        'token' => 'required|min:5',
    ]);

    $email = session('otp_email');

    if (!$email) {
        return back()->withErrors([
            'email' => 'Session expired'
        ]);
    }

    $otp = $this->opt2->validate($email, $request->token);

    if (!$otp) {
        return back()->withErrors([
            'token' => 'Invalid OTP'
        ]);
    }

    return redirect()->route('dashboard.password.reset', [
        'token' => $request->token,
        'email' => $email
    ]);
}
}
