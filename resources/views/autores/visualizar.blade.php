<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre o autor</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .prg {
            color: white;
            width: 50%;
            margin: auto;
            text-align: left;
            margin-top: 3%;
            font-size: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .btn-voltar {
            padding: 20px;
            background-color: #fff;
            color: #131371ff;
            border-radius: 15px;
            margin-left: 3%;
            margin-bottom: 2%;
            font-weight: bold;
        }

        .bibliografia {
            overflow-wrap: break-word;
            word-break: break-word;
            white-space: normal;
        }
    </style>
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Sobre o autor
            </h2>
        </x-slot>
        <div class="prg">
            <p><b>Nome do Autor: </b>{{$autor->nome}}</p>
            <p><b>Nacionalidade: </b>{{$autor->nacionalidade}}</p>
            <p class="bibliografia"><b>Bibliografia: </b>{{$autor->bibliografia}}</p>
            <p><b>Livros:</b></p>
            <ul>
                @foreach($autor->livros as $livro)
                <li>{{ $livro->titulo }}</li>
                @endforeach
            </ul>
        </div>
    </x-app-layout>
</body>

</html>