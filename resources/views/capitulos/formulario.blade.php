<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Capitulos</title>
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

        .select2-container--default .select2-selection--single {
            height: 55px;
            padding: 15px;
            width: 100%;
        }
    </style>
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Formulário de capitulos') }}
            </h2>
        </x-slot>

        <!-- Formulário do Livro-->
        <div class="form-cad">
            <form action="{{route('cadastrar.capitulo')}}" method="post">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <input type="text" name="titulo" placeholder="Título do Capítulo">
                <input type="text" name="personagens" placeholder="Personagens">
                <input type="text" name="ideia_principal" placeholder="Ideia Principal">
                <input type="text" name="numero_paragrafos" placeholder="Numero de Paragráfos">
                <select  name="livro_id" class="select2" style="width: 100%">
                    <option>Selecione o Livro</option>
                   @foreach($livros as $livro)
                   <option value="{{ $livro->id }}">{{$livro -> titulo}}</option>
                   @endforeach
                </select>
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