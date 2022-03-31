<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{

    /**
     * Método responsável por exibir o formulário de login
     *
     * @return Response
     */
    public function index()
    {
        return view('login');
    }


    /**
     * Método que executa o login
     *
     * @param Request $request
     * @return Response
     */
    public function login(Request $request)
    {

        $rules = [
            'email'                          => 'required|email',
            'password'                       => 'required'
        ];

        $feedback = [
            'required'                   =>   'O campo :attribute não foi preenchido',
            'email'                      =>   'Preencha com email válido',
        ];

        $request->validate($rules,$feedback);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        Auth::attempt($credentials);

        if(Auth::check()){
            return redirect()->route('produto.index');
        }else{
            $errors = new MessageBag(['password' => ['Email e/ou Senha inválidos!']]);
            return redirect()->back()->withErrors($errors);

        }
    }
    /**
     * Método que desloga o usuário
     *
     * @return Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
