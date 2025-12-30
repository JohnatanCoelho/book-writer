<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de livros</title>
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
                {{ __('Atualizar Livro') }}
            </h2>
        </x-slot>

        <div class="form-cad">
            <form action="{{route('atualizar.livro', ['livro' => $livro -> id])}}" method="post">
                @csrf
                 @method('PUT')
                <input type="text" name="titulo" placeholder="Título do Livro" value="{{ old('titulo', $livro -> titulo)}}">
                <select class="select2" name="tipo" style="width: 100%" >
                    <option></option>
                    <option value="Ação" @selected(old('tipo', $livro->tipo) == 'Ação')>Ação</option>
                    <option value="Aventura" @selected(old('tipo', $livro->tipo) == 'Aventura')>Aventura</option>
                    <option value="Comédia" @selected(old('tipo', $livro->tipo) == 'Comédia')>Comédia</option>
                    <option value="Drama" @selected(old('tipo', $livro->tipo) == 'Drama')>Drama</option>
                    <option value="Romance" @selected(old('tipo', $livro->tipo) == 'Romance')>Romance</option>
                    <option value="Fantasia" @selected(old('tipo', $livro->tipo) == 'Fantasia')>Fantasia</option>
                    <option value="Ficção" @selected(old('tipo', $livro->tipo) == 'Ficção')>Ficção</option>
                    <option value="Terror" @selected(old('tipo', $livro->tipo) == 'Terror')>Terror</option>
                    <option value="Infantil" @selected(old('tipo', $livro->tipo) == 'Infantil')>Infantil</option>
                    <option value="Poesia" @selected(old('tipo', $livro->tipo) == 'Poesia')>Poesia</option>
                    <option value="Conto de Fadas" @selected(old('tipo', $livro->tipo) == 'Conto de Fadas')>Conto de Fadas</option>
                    <option value="Mistério" @selected(old('tipo', $livro->tipo) == 'Mistério')>Mistério</option>
                </select>
                <input type="submit" value="Atualizar">
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