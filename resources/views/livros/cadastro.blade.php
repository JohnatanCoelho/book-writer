<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>

    <style>
       .form-cad{
            margin: 0 auto; 
            margin-top: 3%;
            width: 30%;
       }

       form input{
            width: 100%;
            padding: 15px;
            margin-top: 2%;
       }

       form input[type='submit']{
            background-color: #fff;
            width: 25%;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border: 0;
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
       <input type="text" name="titulo" placeholder="Título do Livro">
        <input type="text" name="tipo" placeholder="Tipo do Livro">
        <input type="submit" value="Enviar">
    </form>
    </div>
</x-app-layout>
    
</body>
</html>