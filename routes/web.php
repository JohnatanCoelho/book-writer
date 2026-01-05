<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\CapituloController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Rotas de Gráficos
Route::get('/graf_tipo', [LivroController::class, 'grafico_tipos']
)->name('graf.tipos');
Route::get('/dados_tipo', [LivroController::class, 'dados_tipos'])->name('dados.tipo');

//Rotas de autores
Route::get('/cd_autor', [AutorController::class, 'create'])->name('cd_autor');
Route::post('/cd_autor', [AutorController::class, 'cadastrar'])->name('cadastrar.autor');
Route::get('/autores', [AutorController::class, 'index'])->name('autores');
Route::delete('/del_autor/{autor}', [AutorController::class, 'deletar'])->name('deletar.autor');
Route::get('/editar-autor/{autor}', [AutorController::class, 'edit'])->name('ed_autor');
Route::put('/edit-autor/{autor}', [AutorController::class, 'update'])->name('atualizar.autor');
Route::get('/visualizar/{autor}', [AutorController::class, 'visualizar'])->name('visualizar.autor');

//Rota de capitulos
Route::get('/cd_cap', [CapituloController::class, 'create'])->name('cd_cap');
Route::post('/cd_cap', [CapituloController::class, 'cadastrar'])->name('cadastrar.capitulo');
Route::get('/capitulos/{livro}', [CapituloController::class, 'index'])->name('capitulos');
Route::get('/cap/{capitulo}', [CapituloController::class, 'buscar'])->name('buscar.capitulo');
Route::delete('/deletar-cap/{capitulo}', [CapituloController::class, 'deletar'])->name('deletar.capitulo');
Route::get('/editar-cap/{capitulo}', [CapituloController::class, 'editarpg'])->name('editarpg.capitulo');
Route::put('/editar-cap/{capitulo}', [CapituloController::class, 'editar'])->name('editar.capitulo');

// Rota livro
Route::get('/livros', [LivroController::class, 'index'])->name('livros');
Route::get('/cd_livro', [LivroController::class, 'create'])->name('cd_livro');
Route::post("/livros", [LivroController::class, 'cadastrarLivro'])->name('cadastrar.livro');

Route::get("/edit/{livro}", [LivroController::class, 'edit'])->name('edit'); // Apresenta a página de atualizar o livro
Route::put("/update/{livro}", [LivroController::class, 'update'])->name("atualizar.livro"); // Atualizar o livro

Route::delete("/deletar-livro/{livro}", [LivroController::class, 'deletarLivro'])->name('deletar.livro');

//Welcome
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
