<?php

namespace App\Http\Controllers;

use App\Models\Livro;

class LivroController extends Controller
{
    
    public function index(){

        $livros = Livro::all();

        return view('livros.index', compact('livros'));
    }

}
