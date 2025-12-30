<?php

use App\Http\Controllers\LivroController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/livros', [LivroController::class, 'index'])->name('livros');

// Rota de cadastro de livro
Route::get('/cd_livro', [LivroController::class, 'create'])->name('cd_livro');
Route::post("/livros", [LivroController::class, 'cadastrarLivro'])->name('cadastrar.livro');

Route::get("/edit/{livro}", [LivroController::class, 'edit'])->name('edit'); // Apresenta a página de atualizar o livro
Route::put("/update/{livro}", [LivroController::class, 'update'])->name("atualizar.livro"); // Atualizar o livro

Route::delete("/deletar-livro/{livro}", [LivroController::class, 'deletarLivro'])->name('deletar.livro');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
