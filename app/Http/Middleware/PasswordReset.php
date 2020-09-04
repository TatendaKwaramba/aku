<?php

namespace App\Http\Middleware;

use Closure;
use App\OldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\User;

class PasswordReset
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!($request->is('password/reset') && $request->isMethod('post'))) {
            return $next($request);
        }

        $password = $request->input('password');
        $email = $request->input('email');
        $user = User::whereEmail($email)->first();

        if ($user != null) {

            $oldPasswords = OldPassword::whereEmail($user->email)->get();

            foreach ($oldPasswords as $oldPassword) {
                if (Hash::check($password, $oldPassword->password)) {

                    return redirect()->back()->with('status', 'This password has been used  in the past. Please try a different one')
                        ->withInput(request()->all());
                }
            }

            return $next($request);

        } else {
            return $next($request);
        }

    }

}
