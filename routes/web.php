<?php
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/game', [GameController::class, 'index'])->name('games.index');
Route::get('/game/create', [GameController::class, 'create'])->name('games.create');
Route::get('/game/{id}/show', [GameController::class, 'show'])->name('games.show');
Route::get('/game/{id}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::post('/game/store', [GameController::class, 'store'])->name('games.store');
Route::put('/game/{id}/update', [GameController::class, 'update'])->name('games.update');
Route::delete('/game/{id}/destroy', [GameController::class, 'destroy'])->name('games.destroy');

