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


        // $request->session()->flash('alert', 'Operação realizada com sucesso!');
 
     
        // return view('RegisterUser.Index');
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
