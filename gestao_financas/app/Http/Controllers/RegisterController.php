<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function index(): View
    {
        return view('RegisterUser.Index');
    }

    public function save(Request $request)
    {
        $dados = $request->all();

        $request->validate([
            'nameUser'  => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required',
            'confirmPassword' => 'required|same:password'
        ], [
            'nameUser.required' => 'O nome deve ser obrigatório.',
            'email.required'    => 'O email deve ser obrigatório',
            'email.email' => 'Forneça um endereço de email válido.',
            'email.unique' => 'Este email já está cadastrado.',
            'password.required' => 'A senha é obrigatória.',
            'confirmPassword.same' => 'Erro na confirmação de senha, tenta novamente',
            'confirmPassword.required' => 'A confirmação de senha deve ser realizada'
        ]);

        dd("caiu");

        //Verificando arquivo de imagem
        if($request->hasFile('imageUser')){
            $dados['imageUser'] = self::generate_name_image($request, $dados);
        }

        // Criação do novo registro
        User::create([
            'name' => $dados['nameUser'],
            'email' => $dados['email'],
            'password' => bcrypt($dados['password']), // Criptografar a senha
            'photo' => $dados['imageUser'],
        ]);

        return redirect()->route('login.index')->with('success', 'Registro criado com sucesso!');
    }


    public function generate_name_image($request, $dados){
    
        $imagem = $request->file('imageUser');             //Traz o arquivo para do formulario
        $num = rand(1111,9999);                         // gerando número randomico para o nome do arquivo
        $dir = "img/cursos/";                           // diretorio de imagem
        $exte = $imagem->guessClientExtension();        // pegando extensão do arquivo
        $nomeImagem = "imagem_" . $num . "." . $exte;   // criando nome da imagem
        $imagem->move($dir, $nomeImagem);               // movendo para diretorio
        $caminhoImagem =  $dir . "/" . $nomeImagem;

        return $caminhoImagem;
    }
}
