<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Helpers\TokenHelper;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    public function create(Request $request)
    {
        $encryptedData = $request->query('data');
        $data = TokenHelper::decrypt($encryptedData);

        if ($data === null) {
            return redirect()->route('password.request')->withErrors(['token' => 'Invalid token.']);
        }

        $token = $data['token'];
        $email = $data['email'];

        $tokenData = DB::table(config('auth.passwords.users.table'))->where('email', $email)->first();

        if ($tokenData === null) {
            return redirect()->route('password.request')->with(['message' => 'Authentication timeout, please request a new password reset.']);
        }

        return view('auth.passwords.reset')->with([
            'token' => $token,
            'email' => $email,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $status = Password::reset(
            $request->only('token', 'email', 'password', 'password_confirmation'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();

                DB::table(config('auth.passwords.users.table'))
                    ->where('email', $user->email)
                    ->delete();
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('message', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
