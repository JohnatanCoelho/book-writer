<?php

namespace App\Http\Controllers;

use App\Models\Capitulo;
use App\Models\Livro;
use Illuminate\Http\Request;

class CapituloController extends Controller
{
    public function index(Livro $livro){
        $capitulos = $livro -> capitulos()->get();

        return view('capitulos.index', compact('capitulos'));
    }

    public function create(){
        $livros = Livro::all();

        return view('capitulos.formulario', compact('livros'));
    }

    public function cadastrar(Request $request){
       
        Capitulo::create($request->all());

        return redirect()->route('livros');

    }
}
