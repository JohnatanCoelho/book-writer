<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Capítulos</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .form-cad {
            margin: 0 auto;
            margin-top: 3%;
            width: 30%;
        }

        form input {
            width: 100%;
            padding: 15px;
            margin-bottom: 5%;
        }

        form input[type='submit'] {
            background-color: #fff;
            margin-top: 4%;
            width: 25%;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 0;
        }

        textarea{
            height: 500px;
            width: 500px;
        }
    </style>
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Editar capitulo') }}
            </h2>
        </x-slot>

        <div class="form-cad">
            <form action="{{route('editar.capitulo', ['capitulo' => $capitulo->id])}}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="titulo" placeholder="Título do Capítulo" value="{{ old('titulo', $capitulo-> titulo)}}">
                <textarea name="resumo_gerado">{{ old('resumo_gerado', $capitulo->resumo_gerado)}}</textarea>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </x-app-layout>
</body>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Tipo',
            minimumResultsForSearch: 0,
        });
    });
</script>

</html>