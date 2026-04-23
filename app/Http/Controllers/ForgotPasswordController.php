<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\password_reset_tokens;
use Carbon\Carbon;


class ForgotPasswordController extends Controller
{
    public function showResetPassword($token)
    {
       return view('AuthLogin.ForgotPassword', ['token' => $token]);
    }

      public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);
        $code = rand(100000, 999999);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'verifycode'=>$code,
                'created_at' => Carbon::now()
            ]
        );
        $link = url('/reset-password?token=' . $token . '&email=' . $request->email);
       
        Mail::send('AuthLogin.PageAllowInEmail', ['code' => $code], function ($message) use ($request, $code) {
        $message->to($request->email);
        $message->subject('Your verification code: ' . $code);
    });
        return view('AuthLogin.VerifyCode',['code' => $code]);
    }

    public function showResetForm()
    {
        return view('AuthLogin.RestPassword');
    }

    public function verifycode(Request $request)
    {
        $request->validate([
            'CodeOPT'=> 'required|min:6|'
        ]);
        $record = DB::table('password_reset_tokens')
        ->where('verifycode', $request->CodeOPT)
        ->first();
        if (!$record) {
            return back()->with('error', 'Invalid Code OPT');
        }
        // if (Carbon::parse($record->created_at)->addMinutes(60)->isPast()) {
        //     return back()->withErrors(['CodeOPT' => 'CodeOPT expired']);
        // }
        return view('AuthLogin.RestPassword');
    }

    public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
        'token' => 'required'
    ]);

    $record = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->where('token', $request->token)
        ->first();
    if (!$record) {
        return back()->with('error', 'Invalid token');
    }

    // update password
    DB::table('users')
        ->where('email', $request->email)
        ->update([
            'password' => Hash::make($request->password)
        ]);

    // delete token
    DB::table('password_reset_tokens')->where('email', $request->email)->delete();

    return redirect('/login')->with('success', 'Password updated');
}

}
