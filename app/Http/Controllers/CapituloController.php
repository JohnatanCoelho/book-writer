<?php

namespace App\Http\Controllers;

use App\Models\Capitulo;
use App\Models\Livro;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



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

    public function buscar(Capitulo $capitulo){
        $cap = Capitulo::find($capitulo->id);

       return view('capitulos.visualizar', compact('cap'));
    }
}
