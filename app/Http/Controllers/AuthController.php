<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Providers\RouteServiceProvider;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    //const para redirecionar para rota home
    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();

    }

    public function handleProviderCallback($provider)
    {
       $userProvider = Socialite::driver($provider)->stateless()->user();

       $data = User::firstOrCreate([
           'name'                            => $userProvider->getName(),
           'provider_id'                     => $userProvider->getId(),
           'email'                           => $userProvider->getEmail(),
           'provider'                        => $provider
       ]);

       Auth::login($data);

       return redirect($this->redirectTo);
    }
}
