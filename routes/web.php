<?php

use App\Models\Comentario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PerfilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',HomeController::class)->name('home');
// ->name() nombrar ruta para que no se cambie el url a todas las vistas
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route ::get('/login',[LoginController::class,'index'])->name('login');
Route ::post('/login',[LoginController::class,'store']);
Route::post('/logout',[LogoutController::class,'store'])->name('logout');
//ruta para el perfil
Route::get('/editar-perfil',[PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil',[PerfilController::class, 'store'])->name('perfil.store');
//{user}----toma por defecto el id,:username, coloca el url con el nombre del username
Route::get('/{user:username}',[PostController::class,'index'])->name('post.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');

Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}',[PostController::class,'show'])->name('posts.show');

Route::post('/{user:username}/posts/{post}',[ComentarioController::class,'store'])->name('comentarios.store');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');

//like a las fotos
Route::post('/posts/{post}/likes',[LikeController::class, 'store'])->name('posts.likes.store');

Route::delete('/posts/{post}/likes',[LikeController::class, 'destroy'])->name('posts.likes.destroy');

//siguiendo a usuario

Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('users.unfollow');


