<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LivroController extends Controller
{
    
    public function index(){

        $livros = Livro::with('autores')->get(); 
        return view('livros.index', compact('livros'));
    }
    
    public function create(){
        $autores = Autor::all();
        return view('livros.cadastro', compact('autores'));
    }

    public function cadastrarLivro(Request $request, Livro $livro){

        $request -> validate([
            'titulo' => [
                'required',
                'string',
                Rule::unique('livros', 'titulo' )->ignore($livro->id),
            ],
            'tipo' => 'required|string',
            'autores' => 'required|array|min:1',
            'autores.*' => 'exists:autores,id'
        ]);
        
        $livro = Livro::create(
            ['titulo' => $request->titulo,
            'tipo' => $request->tipo]
        ); 

        $livro->autores()->sync($request->autores);

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
            'tipo' => 'required|string',
            'autores' => 'required|array|min:1',
            'autores.*' => 'exists:autores,id'
        ]);

        $livro -> update([
            'titulo' => $request -> titulo,
            'tipo' => $request -> tipo
        ]);

        return redirect()->route('livros')->with('Atualizado com sucesso!');
    }

    public function grafico_tipos(){
        return view('livros.graph');
    }

    public function dados_tipos(){
        $tipos = Livro::select('tipo', DB::raw('COUNT(*) as total'))
        ->groupBy('tipo')
        ->get();

        return response()->json($tipos);
    }

}
