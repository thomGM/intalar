<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cadastroClienteController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cadastro_cliente', function () {
    return view('cadastro_cliente');
})->middleware(['auth', 'verified'])->name('cadastro_cliente');

Route::get('/listaCliente', function () {
    return view('listaCliente');
})->middleware(['auth', 'verified'])->name('listaCliente');

Route::get('/ordemServico', function () {
    return view('ordemServico');
})->middleware(['auth', 'verified'])->name('ordemServico');

Route::get('/layoutServ', function () {
    return view('layoutServ');
})->middleware(['auth', 'verified'])->name('layoutServ');

Route::get('/servUp', function () {
   // $id = request('id');
    return view('servUp');
})->middleware(['auth', 'verified'])->name('servUp');

Route::get('/clienteUp', function () {
    // $id = request('id');
     return view('clienteUp');
 })->middleware(['auth', 'verified'])->name('clienteUp');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/cadastrar-cliente', [\App\Http\Controllers\cadastroCliente::class, 'cadastrarCliente'])->name('cadastro.cliente');
Route::post('/cadastrar-servico', [\App\Http\Controllers\OrdemServico::class, 'cadastrarOrdemDeServico'])->name('servico.cadastrar');
Route::post('/atualizar-servico', [\App\Http\Controllers\OrdemServico::class, 'atualizarServico'])->name('servico.atualizar');
Route::post('/layoutServ', [\App\Http\Controllers\OrdemServico::class, 'listarServicosTabela'])->name('lista.servico');
Route::post('/atualizar-cliente', [\App\Http\Controllers\cadastroCliente::class, 'atualizarCliente'])->name('lista.cliente');


require __DIR__.'/auth.php';
