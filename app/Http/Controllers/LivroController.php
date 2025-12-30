<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    
    public function index(){

        $livros = Livro::all(); 

        return view('livros.index', compact('livros'));
    }
    
    public function create(){
        return view('livros.cadastro');
    }

    public function cadastrarLivro(Request $request){
        
        Livro::create($request->all()); 

        return redirect()->route('livros');
    }

    public function deletarLivro(Livro $livro){
        $livro -> delete();

        return redirect()->route('livros');
    }

    public function update(Request $request){

        $request->validate();
        
    }

    public function pgatualizacao(Livro $livro){
        
            return view('livros.atualizarLivro', compact('livro'));
    }

}
