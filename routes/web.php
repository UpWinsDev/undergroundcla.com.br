<?php

use Illuminate\Support\Facades\Auth;
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


Route::middleware(['admin'])->group(function(){

    // area administrativa

Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.index');

Route::get('/admin/classes', [App\Http\Controllers\ClassesController::class, 'index'])->name('classes.index');

Route::get('/admin/games', [App\Http\Controllers\GamesController::class, 'index'])->name('games.index');
Route::get('/admin/games/create', [App\Http\Controllers\GamesController::class, 'showForm'])->name('games.create');
Route::post('/admin/games/create/do', [App\Http\Controllers\GamesController::class, 'create'])->name('games.create.do');
Route::get('admin/games/edit/{id}', [App\Http\Controllers\GamesController::class, 'edit'])->name('games.edit');
Route::post('admin/games/edit/do/{id}', [App\Http\Controllers\GamesController::class, 'update'])->name('games.edit.do');
Route::get('/admin/games/delete/{id}', [App\Http\Controllers\GamesController::class, 'destroy'])->name('games.destroy');

Route::get('/admin/patrocinadores', [App\Http\Controllers\PatrocinadoresController::class, 'index'])->name('patrocinadores.index');
Route::get('/admin/patrocinadores/create', [App\Http\Controllers\PatrocinadoresController::class, 'showForm'])->name('patrocinadores.create');
Route::post('/admin/patrocinadores/create/do', [App\Http\Controllers\PatrocinadoresController::class, 'create'])->name('patrocinadores.create.do');
Route::get('admin/patrocinadores/edit/{id}', [App\Http\Controllers\PatrocinadoresController::class, 'edit'])->name('patrocinadores.edit');
Route::post('admin/patrocinadores/edit/do/{id}', [App\Http\Controllers\PatrocinadoresController::class, 'update'])->name('patrocinadores.edit.do');
Route::get('/admin/patrocinadores/delete/{id}', [App\Http\Controllers\PatrocinadoresController::class, 'destroy'])->name('patrocinadores.destroy');

Route::get('/admin/times', [App\Http\Controllers\TimesController::class, 'index'])->name('times.index');
Route::get('/admin/times/create', [App\Http\Controllers\TimesController::class, 'showForm'])->name('times.create');
Route::post('/admin/times/create/do', [App\Http\Controllers\TimesController::class, 'create'])->name('times.create.do');
Route::get('admin/times/edit/{id}', [App\Http\Controllers\TimesController::class, 'edit'])->name('times.edit');
Route::post('admin/times/edit/do/{id}', [App\Http\Controllers\TimesController::class, 'update'])->name('times.edit.do');
Route::get('/admin/times/delete/{id}', [App\Http\Controllers\TimesController::class, 'destroy'])->name('times.destroy');

Route::get('/admin/torneios', [App\Http\Controllers\TorneiosController::class, 'indexAdm'])->name('adm.torneios.index');
Route::get('/admin/torneios/create', [App\Http\Controllers\TorneiosController::class, 'showForm'])->name('torneios.create');
Route::post('/admin/torneios/create/do', [App\Http\Controllers\TorneiosController::class, 'create'])->name('torneios.create.do');
Route::get('admin/torneios/edit/{id}', [App\Http\Controllers\TorneiosController::class, 'edit'])->name('torneios.edit');
Route::post('admin/torneios/edit/do/{id}', [App\Http\Controllers\TorneiosController::class, 'update'])->name('torneios.edit.do');
Route::get('/admin/torneios/delete/{id}', [App\Http\Controllers\TorneiosController::class, 'destroy'])->name('torneios.destroy');

Route::get('/admin/players', [App\Http\Controllers\PlayersController::class, 'index'])->name('players.index');
Route::get('/admin/players/time/{id}', [App\Http\Controllers\PlayersController::class, 'showTimes'])->name('players.showTimes');
Route::get('/admin/players/create', [App\Http\Controllers\PlayersController::class, 'showForm'])->name('players.create');
Route::post('/admin/players/create/do', [App\Http\Controllers\PlayersController::class, 'create'])->name('players.create.do');
Route::get('admin/players/edit/{id}', [App\Http\Controllers\PlayersController::class, 'edit'])->name('players.edit');
Route::post('admin/players/edit/do/{id}', [App\Http\Controllers\PlayersController::class, 'update'])->name('players.edit.do');
Route::get('/admin/players/delete/{id}', [App\Http\Controllers\PlayersController::class, 'destroy'])->name('players.destroy');

Route::get('/admin/playerTimes/{id}', [App\Http\Controllers\PlayerTimesController::class, 'index'])->name('playerTimes.index');
Route::get('/admin/playerTimes/create/{id}', [App\Http\Controllers\PlayerTimesController::class, 'showForm'])->name('playerTimes.create');
Route::get('/admin/playerTimes/create/do/{id}', [App\Http\Controllers\PlayerTimesController::class, 'create'])->name('playerTimes.create.do');
Route::get('admin/playerTimes/edit/{id}', [App\Http\Controllers\PlayerTimesController::class, 'edit'])->name('playerTimes.edit');
Route::post('admin/playerTimes/edit/do/{id}', [App\Http\Controllers\PlayerTimesController::class, 'update'])->name('playerTimes.edit.do');
Route::get('/admin/playerTimes/delete/{id}', [App\Http\Controllers\PlayerTimesController::class, 'destroy'])->name('playerTimes.destroy');
Route::get('/admin/contribuicao', [App\Http\Controllers\ContribuicaoEqpsController::class, 'index'])->name('contribuicao.index');



Route::get('/admin/escudos', [App\Http\Controllers\EscudosController::class, 'index'])->name('escudos.index');

});


// site player

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::get('/sobre', [App\Http\Controllers\HomeController::class, 'sobre'])->name('home.sobre');

Route::get('/torneios', [App\Http\Controllers\HomeController::class, 'torneios'])->name('home.torneios');

Route::get('/recrutamento', [App\Http\Controllers\HomeController::class, 'recrutamento'])->name('home.recrutamento');

Route::post('/admin/players/recrutar', [App\Http\Controllers\PlayersController::class, 'recrutar'])->name('players.recrutar');

Route::get('/contribuir', [App\Http\Controllers\HomeController::class, 'contribuir'])->name('home.contribuir');

Route::post('/admin/contribuir', [App\Http\Controllers\ContribuicaoEqpsController::class, 'update'])->name('contribuir.update');

Route::post('/email-contato', [App\Mail\contato::class, 'build'])->name('email.contato');


// Login sem Steam
//Route::get('auth/steam', [App\Http\Controllers\AuthController::class, 'handle'])->name('auth.steam');

// Steam Login Route
Route::get('auth/steam', [App\Http\Controllers\AuthController::class, 'redirectToSteam'])->name('auth.steam');
Route::get('auth/steam/handle', [App\Http\Controllers\AuthController::class, 'handle'])->name('auth.steam.handle');

Route::get('logout',  [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
