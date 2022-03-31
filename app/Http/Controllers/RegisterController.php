<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(User $user)
    {
        //Injeta a model nos métodos
        $this->user = $user;

        //Middleware responsável por redirecionar o usuário se já estiver logado
        $this->middleware('guest');
    }

    /**
     * Método responśavel por exibir o formulário de registro
     *
     * @return Response
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Método responsável por validar os campos do formulário e registrar o usuário no Banco
     *
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {

        $rules = [
            'nome'  => 'required|min:5|max:30',
            'email'  => 'required|email|unique:users,email',
            'senha'  => 'required|min:5|max:15',

        ];
        $feedback = [
            'required'      =>   'O campo :attribute não foi preenchido!',
            'min'           =>   'O campo :attribute exige no minimo 5 caracteres!',
            'nome.max'      =>   'O campo nome deve ter no máximo 30 caracteres',
            'senha.max'     =>   'O campo password deve ter no máximo 15 caracteres',
            'email.email'   =>   'Preencha com um email válido',
            'email.unique'  =>   'O email informado já existe!'
        ];

        $request->validate($rules,$feedback);

        $this->user->create(
            [
                'name'              => $request->nome,
                'email'             => $request->email,
                'password'          => Hash::make($request->senha)
            ]);

        return redirect()->route('login');

    }
}
