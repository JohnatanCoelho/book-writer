<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index(){
        $autores = Autor::with('livros')->get();
       
        return view('autores.index', compact('autores'));
    }

    public function visualizar(Autor $autor){

        $autor->load('livros');

        return view('autores.visualizar',compact('autor'));
    }
   
    public function create()
    {
        $livros = Livro::all();
        return view('autores.cadastrar', compact('livros'));
    }

    public function cadastrar(Request $request, Autor $autor)
    {
            $request->validate([
                'nome' => 'required|string|max:100',
                'nacionalidade' => 'required|string',
                'bibliografia' => 'required|string',
                'livros' => 'required|array|min:1',
                'livros.*' => 'exists:livros,id'
            ]);

            $autor = Autor::create([
                'nome' => $request->nome,
                'nacionalidade' => $request->nacionalidade,
                'bibliografia' => $request->bibliografia
            ]);

            if($request->filled('livros')){
                $autor->livros()->sync($request->livros);
            }

            return redirect()->route('autores');
    }

    public function deletar(Autor $autor){
        
        $autor->delete();

        $autores = Autor::with('livros')->get();
       
        return view('autores.index', compact('autores'));
    }

    public function edit(Autor $autor){
        $livros = Livro::all();

        return view('autores.editar', compact('autor', 'livros'));
    }

    public function update(Request $request, Autor $autor){

         $request->validate([
                'nome' => 'required|string|max:100',
                'nacionalidade' => 'required|string',
                'bibliografia' => 'required|string',
                'livros' => 'required|array|min:1',
                'livros.*' => 'exists:livros,id'
            ]);

            $autor-> update(
                [
                    'nome'=> $request->nome,
                    'nacionalidade'=> $request->nacionalidade,
                    'bibliografia'=>$request->bibliografia
                ]
            );


        $autor->livros()->sync($request->livros ?? []);

        $autores = Autor::with('livros')->get();

        return view('autores.index', compact('autores'));

    }
}
