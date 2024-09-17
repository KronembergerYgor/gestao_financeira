<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('Login.Index'); //Retorna a view de Login
  
    }

    public function loginEnter(Request $request){

        // Validar os dados do formulário
        $credentials = $request->validate([ // Realiza as validações dos campos para realizar o login
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required'    => 'O email deve ser obrigatório',
            'email.email'       => 'Forneça um endereço de email válido.',
            'password.required' => 'A senha é obrigatória.',
        ]);

        // Verificar se as credenciais são válidas
        if (Auth::attempt($credentials)) {
            // Redirecionar o usuário autenticado
            return redirect()->intended(route('home.index'))->with('success', 'Login realizado com sucesso!');
        }

        // Redirecionar de volta com erro
        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ])->onlyInput('email');
        
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Efetua o logout do usuário

        $request->session()->invalidate(); // Invalida a sessão atual
        $request->session()->regenerateToken(); // Regenera o token CSRF

        return redirect(route('login.index'))->with('success', 'Você saiu com sucesso!');
    }
}
