<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\contatoController;
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

Route::get('/', [contatoController::class,'listamarca']);
Route::post("/",[contatoController::class,'sendmail']);
//Route::get('envio-email', function () {
//    $user=new stdClass();
//        $user->name = "Erick";
//        $user->mail = "erick.nagata@gmail.com";
    //return new  \App\Mail\sendmail($user);
//    Mail::send(new  \App\Mail\sendmail($user));
//});
