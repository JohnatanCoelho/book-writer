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
        .cap{
            background-color: white;
            color: #000000ff;
            width: 30%;
            margin: auto;
            border-radius: 15px;
            margin-top: 5%;
        }
        .cap p{
            padding: 2%;
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
        @foreach($capitulos as $capitulo)
        <div class="cap">
            <p><b>Capitulo:</b> {{$loop-> index + 1}}</p>
            <p><b>Título:</b> {{$capitulo -> titulo}}</p>
            <p><b>Personagens:</b> {{$capitulo -> personagens}}</p>
            <p><b>Ideia Principal:</b> {{$capitulo -> ideia_principal}}</p>
            <p><b>Número de parágrafos:</b> {{$capitulo -> numero_paragrafos}}</p>
        </div>
        @endforeach
    </x-app-layout>
</body>

</html>