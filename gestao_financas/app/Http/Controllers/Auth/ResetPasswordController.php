<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    // Exibe o formulário de redefinição de senha
    public function showResetForm(Request $request, $token = null)
    {
        return view('resetPassword.reset', ['token' => $token, 'email' => $request->email]);
    }

    // Processa a redefinição de senha
    public function reset(Request $request)
    {
        // Valida os dados fornecidos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'token' => 'required'
        ]);

        // Tenta redefinir a senha
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                // Redefine a senha do usuário
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();

                // Dispara o evento de redefinição de senha
                event(new PasswordReset($user));
            }
        );

        // Se a redefinição for bem-sucedida
        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login.index')->with('status', __($status));
        }

        // Caso haja algum erro
        return back()->withErrors(['email' => [__($status)]]);
    }
}
