<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    
    public function index(){

        $livros = Livro::paginate(10); // paginate() -> pode páginar registros muito bom por sinal

        return view('livros.index', compact('livros'));
    }
    
    public function create(){
        return view('livros.cadastro');
    }

    public function cadastrarLivro(Request $request){
        
        Livro::created($request->except('_token')); 

        return redirect()->route('livros');
    }

}
