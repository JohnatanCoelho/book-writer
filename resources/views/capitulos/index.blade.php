<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Capitulos</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .cap-alinhado {
            margin: auto;
            display: flex;
            width: 90%;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: stretch;
            margin-top: 5%;
            gap: 20px;
        }

        .cap {
            background-color: #1F2937;
            color: #fff;
            width: calc(33.333% - 20px);
            border-radius: 15px;
            padding-bottom: 15px;
        }

        .cap p {
            margin-left: 3.5%;
            padding: 2%;
        }

        .cap h1 {
            margin-left: 3.5%;
            padding: 2%;
            font-size: 25px;
        }

        .btn-alinhado {
            display: flex;
            margin-top: 2%;
            margin-left: 3.5%;
            gap: 10px;
        }

        .btn {
            text-align: center;
            display: block;
            font-weight: bold;
            margin-left: 1.5%;
            color: white;
            border-radius: 15px;
            margin-left: 1%;
        }

        .btn-escrever {
            background-color: #5cc237ff;
            padding: 10px;
        }

        .btn-Vis {
            background-color: #3e37c2ff;
            padding: 10px;
        }
         .btn-deletar {
            background-color: #c23737ff;
            padding: 10px;
        }
        .btn-editar {
            background-color: #c2ad37ff;
            padding: 10px;
        }
        
    </style>
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Lista de Capitulos') }}
            </h2>
        </x-slot>
        <div class="cap-alinhado">
            @foreach($capitulos as $capitulo)
            <div class="cap">
                <h1><b>Capitulo:</b> {{$loop->index + 1}}</h1>
                <p><b>Título:</b> {{$capitulo->titulo}}</p>
                <p><b>Personagens:</b> {{$capitulo->personagens}}</p>
                <p><b>Ideia Principal:</b> {{$capitulo->ideia_principal}}</p>
                <p><b>Número de parágrafos:</b> {{$capitulo->numero_paragrafos}}</p>
                <div class="btn-alinhado">
                    <a href="{{ route('buscar.capitulo', ['capitulo' => $capitulo->id]) }}"><button type="submit" class="btn btn-Vis">Visualizar</button></a>
                    <form action="{{ route('deletar.capitulo', ['capitulo' => $capitulo->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-deletar">Deletar</button>
                    </form>
                     <a href="{{ route('editarpg.capitulo', ['capitulo'=> $capitulo->id])}}"><button type="submit" class="btn btn-editar">Editar</button></a>
                </div>
                <br>
            </div>
            @endforeach
        </div>
    </x-app-layout>
</body>

</html>