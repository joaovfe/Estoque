<?php

use App\Http\Controllers\AddJoias;
use App\Http\Controllers\ListagemJoias;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ListagemJoias::class, 'listarJoias']);
Route::get('/AdicionarJoia', [AddJoias::class, 'addJoias']);
Route::post('/addJoia', [AddJoias::class, 'salvarJoias']);