<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Providers\RouteServiceProvider;


class AuthController extends Controller
{
    /**
     * Injeta a middleware nos métodos para garantir que um usuário logado não possa acessa-los
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //const para redirecionar para rota home
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Método responsável por redirecionar o usuário para tela de login do provider
     *
     * @param string $provider recebe qual provider o usuário vai logar
     * @return void
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();

    }

    /**
     * Método responsável por recuperar os dados de um usuário no seu determinado provider
     *
     * @param string $provider recebe qual provider o usuário vai logar
     * @return void
     */
    public function handleProviderCallback($provider)
    {
       $userProvider = Socialite::driver($provider)->stateless()->user();

       $data = User::firstOrCreate([
           'name'                            => $userProvider->getName(),
           'provider_id'                     => $userProvider->getId(),
           'email'                           => $userProvider->getEmail(),
           'avatar'                          => $userProvider->getAvatar(),
           'provider'                        => $provider
       ]);

       Auth::login($data);

       return redirect($this->redirectTo);
    }
}
