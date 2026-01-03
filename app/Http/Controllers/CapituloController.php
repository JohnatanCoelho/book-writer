<?php

namespace App\Http\Controllers;

use App\Models\Capitulo;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;


class CapituloController extends Controller
{
    public function index(Livro $livro)
    {
        $capitulos = $livro->capitulos()->get();

        return view('capitulos.index', compact('capitulos'));
    }

    public function create()
    {
        $livros = Livro::all();

        return view('capitulos.formulario', compact('livros'));
    }

    public function cadastrar(Request $request)
    {
        $endpoint = 'https://n8n.pandoapps.com.br/webhook/escritoraDeLivros';

        $payload = [
            'Título' => $request->titulo,
            'Personagens' => $request->personagens,
            'Ideia' => $request->ideia_principal,
            'Número de Parágrafos' => (int) $request->numero_paragrafos
        ];

        $response = Http::post($endpoint, $payload);
        
        $data = $response->json();
        $body = $data['output'];

        // tranforma o array em string
        if(is_Array($body)){
            $body = implode('\n\n', $body);
        }

        $body = (string)$body;

        $dados = $request->all();
        $dados['resumo_gerado'] = $body;

        Capitulo::create($dados);

        return redirect()->route('livros');
    }

    public function buscar(Capitulo $capitulo)
    {
        $cap = Capitulo::find($capitulo->id);

       return view('capitulos.visualizar', compact('cap'));
    }

    public function deletar(Capitulo $capitulo)
    {
        //Buscando o id do livro
        $livro = $capitulo->livro_id;
        $livroFind =Livro::find($livro);

        $capitulo->delete();

        return redirect()->route('capitulos', ['livro' => $livroFind->id]);
    }


    public function editarpg(Capitulo $capitulo){
        $livros = Livro::all();

        return view('capitulos.editar', compact(['livros', 'capitulo']));

    }

    public function editar(Request $request, Capitulo $capitulo){

        $request -> validate([
            'titulo' =>[
                'required',
                'string',
                Rule::unique('capitulos', 'titulo')->ignore($capitulo->id),
            ],
            'resumo_gerado' => 'required|string'            
        ]);


       $capitulo->update([
            'titulo' => $request->titulo,
            'resumo_gerado' => $request->resumo_gerado
        ]);

        $livro = Livro::find($capitulo->livro_id);

        return redirect()->route('capitulos', ['livro' => $livro] );
    }
}
