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

    // Função para gerar o nome da imagem
    public function generate_name_image($request)
    {
        $imagem = $request->file('imageUser');           // Recebe o arquivo do formulário
        $num = rand(1111, 9999);                         // Gera um número aleatório
        $dir = "img/cursos/";                            // Diretório para salvar a imagem
        $exte = $imagem->guessClientExtension();         // Pega a extensão do arquivo
        $nomeImagem = "imagem_" . $num . "." . $exte;    // Cria o nome da imagem
        $imagem->move($dir, $nomeImagem);                // Move a imagem para o diretório
        $caminhoImagem = $dir . $nomeImagem;             // Caminho completo da imagem

        return $caminhoImagem;
    }

    // Função para validar e processar a imagem do usuário
    public function validate_image_user($request)
    {
        // Se o campo de imagem foi enviado e é um arquivo válido
        if ($request->hasFile('imageUser') && $request->file('imageUser')->isValid()) {
            return self::generate_name_image($request);
        }

        // Se não foi enviado, retorna null (será tratado depois)
        return null;
    }

    // Função de update para atualizar os dados do usuário
    public function update(Request $request)
    {
        // Validação do formulário
        $request->validate([
            'nameUser'        => 'required',
            'email'           => 'required|email',
            'confirmPassword' => 'same:password',
        ], [
            'nameUser.required'      => 'O nome deve ser obrigatório.',
            'email.required'         => 'O email deve ser obrigatório',
            'email.email'            => 'Forneça um endereço de email válido.',
            'confirmPassword.same'   => 'Erro na confirmação de senha, tente novamente',
        ]);

        // Recupera os dados do formulário
        $dados = $request->all();

        // dd($dados);

        // Verifica se uma nova imagem foi enviada
        $dados['imageUser'] = self::validate_image_user($request);

        // Se não houver nova imagem, mantém a imagem antiga
        if (empty($dados['imageUser']) && !isset($dados['removePhoto'])) {
            $dados['imageUser'] = $request->input('current_photo');
        }

        //Removendo foto de perfil
        if (isset($dados['removePhoto'])) { 
            $dados['imageUser'] = null;
        }

        // Atualiza os dados do usuário
        User::where('id', Auth::user()->id)
            ->update([
                'name'  => $dados['nameUser'],
                'email' => $dados['email'],
                'photo' => $dados['imageUser'],
            ]);

        // Atualiza a senha apenas se o campo não estiver vazio
        if (!empty($dados['password']) && !empty($dados['confirmPassword'])) {
            User::where('id', Auth::user()->id)
                ->update([
                    'password' => bcrypt($dados['password']),
                ]);
        }

        // Redireciona com sucesso
        return redirect()->route('home.index')->with('success', 'Registro atualizado com sucesso!');
    }
}
