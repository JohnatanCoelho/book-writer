<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <title>Autores</title>

    <style>
        body {
            background-color: #111827;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
        }

        .tamanho-table {
            width: 70%;
            margin: auto;
            margin-top: 5%;
        }

        .tabela-livros {
            width: 100%;
            background-color: #1F2937;
            border: 1px solid #fff;
        }

        .tabela-livros td {
            border: 1px solid #fff;
        }

        .btn {
            text-align: center;
            display: block;
            margin: auto;
            font-weight: bold;
        }
        .btn-cap{
            background-color: #5cc237ff;
            padding: 10px;
        }

        .btn-deletar {
            background-color: #f44e4eff;
            padding: 10px;
        }

        .btn-editar {
            background-color: #ddbf3eff;
            padding: 10px;
        }
          .btn-vis {
            background-color: #61dd3eff;
            padding: 10px;
        }

    </style>
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Autores') }}
            </h2>
        </x-slot>

        <div class="tamanho-table">
            <table id="tabela-autores" class="tabela-livros">
                <thead>
                    <tr>
                        <td>Autor</td>
                        <td>Visualizar</td>
                        <td>Deletar</td>
                        <td>Editar</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($autores as $autor)
                    <tr>
                        <td>{{$autor -> nome}}</td>
                
                       
                        <td><a href="{{route('visualizar.autor',['autor' => $autor->id])}}"><button class="btn btn-vis">Visualizar Autor</button></a></td>
                        <td>
                            <form method="POST" action="{{ route('deletar.autor', ['autor' => $autor -> id]) }}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-deletar">Deletar</button>
                            </form>
                        </td>
                        <td>
                            <button class="btn btn-editar"><a href="{{ route('ed_autor', ['autor' => $autor -> id]) }}">Editar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-app-layout>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
</body>

<script>
    $(document).ready(function() {
        $('#tabela-autores').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.8/i18n/pt-BR.json'
            }
        });
    });
</script>

</html>