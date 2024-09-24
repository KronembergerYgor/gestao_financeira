<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {   
        $user = User::where('id', Auth::user()->id)->first();
        return view('perfilUser.index', compact('user'));
    }  
    
    public function generate_name_image($request){
    
        $imagem = $request->file('imageUser');           //Traz o arquivo para do formulario
        $num = rand(1111,9999);                         // gerando número randomico para o nome do arquivo
        $dir = "img/cursos/";                           // diretorio de imagem
        $exte = $imagem->guessClientExtension();        // pegando extensão do arquivo
        $nomeImagem = "imagem_" . $num . "." . $exte;   // criando nome da imagem
        $imagem->move($dir, $nomeImagem);               // movendo para diretorio
        $caminhoImagem =  $dir . "/" . $nomeImagem;

        return $caminhoImagem;
    }

    public function validate_image_user($request){
        
        //Verificando arquivo de imagem
        if(isset($request->imageUser)){
            if($request->hasFile('imageUser')){
               $imageUser = self::generate_name_image($request);
            }else{
                $imageUser = null;
            }
        }else{
            $imageUser = null;
        }

        return $imageUser;
    }

    public function update(Request $request)
    {
        $dados = $request->all(); //Retorna todos os dados em um array

        $request->validate([ //Valida os campos do formulário de cadastro
            'nameUser'  => 'required',
            'email'     => 'required|email',
            'confirmPassword' => 'same:password'
        ], [
            'nameUser.required' => 'O nome deve ser obrigatório.',
            'email.required'    => 'O email deve ser obrigatório',
            'email.email' => 'Forneça um endereço de email válido.',
            'confirmPassword.same' => 'Erro na confirmação de senha, tenta novamente',
        ]);

        $dados['imageUser'] = self::validate_image_user($request); //Gera um nome para a imagem anexada



        User::where('id', Auth::user()->id)
        ->update([
            'name' => $dados['nameUser'],
            'email' => $dados['email'],
            'photo' => $dados['imageUser'],
        ]);

        if(!empty($dados['password']) && !empty($dados['confirmPassword'])){
            User::where('id', Auth::user()->id)
            ->update([
                'password' => bcrypt($dados['password']), // Criptografar a senha
            ]);

        }


        return redirect()->route('home.index')->with('success', 'Registro criado com sucesso!');
    }
}
