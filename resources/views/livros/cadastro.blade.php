<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
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
            margin-top: 2%;
            margin-bottom: 3%;
        }

        form input[type='submit'] {
            background-color: #fff;
            width: 25%;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 0;
        }

        .select2-container--default .select2-selection--single {
            height: 50px;
            padding: 15px;
            width: 100%;
        }
    </style>
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Cadastro Livros') }}
            </h2>
        </x-slot>

        <!-- Formulário do Livro-->
        <div class="form-cad">
            <form action="{{route('cadastrar.livro')}}" method="post">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <input type="text" name="titulo" placeholder="Título do Livro">
                <select class="select2" name="tipo" style="width: 100%">
                    <option></option>
                    <option value="Ação">Ação</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Conto">Conto</option>
                    <option value="Crônica">Crônica</option>
                    <option value="Drama">Drama</option>
                    <option value="Distopia">Distopia</option>
                    <option value="Fantasia">Fantasia</option>
                    <option value="Ficção Científica">Ficção Científica</option>
                    <option value="Ficção">Ficção</option>
                    <option value="Terror">Terror</option>
                    <option value="Infantil">Infantil</option>
                    <option value="Juvenil">Juvenil</option>
                    <option value="Conto de Fadas">Conto de Fadas</option>
                    <option value="Educativo">Educativo</option>
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