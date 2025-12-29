<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    
    public function index(){

        $livros = Livro::all(); // paginate() -> pode páginar registros muito bom por sinal

        return view('livros.index', compact('livros'));
    }
    
    public function create(){
        return view('livros.cadastro');
    }

    public function cadastrarLivro(Request $request){
        
        Livro::create($request->all()); 

        return redirect()->route('livros');
    }

}
