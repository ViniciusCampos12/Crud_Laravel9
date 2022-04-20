<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')
    ->get('/', [LoginController::class, 'index'])->name('login');

Route::middleware('guest')
    ->post('/', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('guest')
    ->get('/register', [RegisterController::class,'index'])->name('register');

Route::middleware('guest')
    ->post('/register', [RegisterController::class,'register'])->name('register');

Route::resource('produto', ProductController::class);

Route::resource('tag', TagController::class);

//Retorna o usuário para pagina anterior, caso ele tente acessar uma rota inexistente
Route::fallback(function(){
    return redirect()->back();
});


Route::middleware('guest')
    ->get('/auth/redirect/{provider}', [AuthController::class,'redirectToProvider'])->name('redirect');

Route::middleware('guest')
    ->get('/auth/callback/{provider}', [AuthController::class,'handleProviderCallback'])->name('callback.provider');
