<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function edit(Livro $livro){

            return view('livros.atualizarLivro', compact('livro'));
    }

    public function update(Request $request, Livro $livro){

        $request -> validate([
            'titulo' => [
                'required',
                'string',
                Rule::unique('livros', 'titulo' )->ignore($livro->id),
            ],
            'tipo' => 'required|string'
        ]);

        $livro -> update([
            'titulo' => $request -> titulo,
            'tipo' => $request -> tipo
        ]);

        return redirect()->route('livros')->with('Atualizado com sucesso!');
    }

}
