<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$cap->titulo}}</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .prg{
            color: white;
            width: 70%;
            margin: auto;
            text-align: justify;
            margin-top: 3%;
            padding-bottom: 2%;
            font-size: 20px;
        }
        .btn-voltar{
            padding: 20px;
            background-color: #fff;
            color: #131371ff;
            border-radius: 15px;
            margin-left: 3%;
            margin-bottom: 2%;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
               Título do capítulo: {{$cap->titulo}}
            </h2>
        </x-slot>
         <div class="prg">
             {!! nl2br(e($cap->resumo_gerado)) !!}
    </div>
            <a href="{{route('capitulos', ['livro' => $cap -> livro_id])}}"><button class="btn-voltar"><< Voltar</button>
    </x-app-layout>
</body>

</html>