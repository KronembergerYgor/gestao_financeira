<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    // Exibe o formulário de solicitação do e-mail de recuperação
    public function showLinkRequestForm()
    {
        return view('resetPassword.index');  // Aponte para sua view personalizada
    }

    // Envia o e-mail com o link de redefinição de senha
    public function sendResetLinkEmail(Request $request)
    {
        // Valida o e-mail informado
        $request->validate(['email' => 'required|email']);

        // Envia o link de redefinição de senha para o e-mail fornecido
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Verifica se o link foi enviado com sucesso
        if ($status == Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        // Caso ocorra um erro, exibe uma mensagem
        return back()->withErrors(['email' => __($status)]);
    }
}

