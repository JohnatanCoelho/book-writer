<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        .form-cad {
            margin: 0 auto;
            margin-top: 3%;
            width: 30%;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        form input {
            width: 100%;
            padding: 15px;
        }

        textarea {
            width: 100%;
            padding: 15px;
        }

        form input[type='submit'] {
            background-color: #fff;
            width: 25%;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 0;
        }

        .select2-container {
            width: 100% ;
        }

        .select2-container--default .select2-selection--multiple {
            min-height: 65px;
            padding: 10px;
            padding-bottom: 15px;
            display: flex;
            align-items: center;
            margin-top: -3.5%;
        }
    </style>
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Formulário de Autores') }}
            </h2>
        </x-slot>

        <div class="form-cad">
            <form action="{{route('cadastrar.autor')}}" method="post">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <input type="text" name="nome" placeholder="Nome do Autor">
                <input type="text" name="nacionalidade" placeholder="Nacionalidade">
                <textarea name="bibliografia" placeholder="Escreva a bibliografia do autor" style="margin-bottom: 4%;"></textarea>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </x-app-layout>
</body>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: 'Escolha o Livro',
            minimumResultsForSearch: 0,
        });
    });
</script>

</html>