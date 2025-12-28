<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <title>Livros</title>

    <style>
        body{
            background-color: #111827;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
        }
        .tamanho-table{
            width: 70%;
            margin: auto;
            margin-top: 5%;
        }
        .tabela-livros{
            width: 50%;
            background-color: #1F2937; 
            border: 1px solid #fff;
        }

        .tabela-livros td{
            border: 1px solid #fff; 
        }

    </style>
</head>
<body>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Livros') }}
        </h2>
    </x-slot>

    <div class="tamanho-table">
      <table id="tabela-livros" class="tabela-livros">
    <thead>
        <tr>
            <td>Nome</td>
            <td>Tipo</td>
        </tr>
    </thead>
    <tbody>
        @foreach($livros as $livro)
        <tr>
            <td>{{$livro -> titulo}}</td>
            <td>{{$livro -> tipo}}</td>
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
    $(document).ready(function () {
        $('#tabela-livros').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.8/i18n/pt-BR.json'
            }
        });
    });
</script>
</html> 