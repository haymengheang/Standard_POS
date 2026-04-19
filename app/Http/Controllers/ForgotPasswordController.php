<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email'=> 'required|email|exists:users,email'
        ]);
        $token = Str::random(64);
        DB:table('password_reset_tokens')->updateOrInsert(
            ['email'=> $request->email],
            [
                'token'=> $token,
                'created'=>now()
            ]
        );
        return back()->with('success', 'Reset link: ' . url('/reset-password/'.$token));
    }
    public function showResetPassword($token)
    {
       return view('AuthLogin.ForgotPassword', ['token' => $token]);
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
