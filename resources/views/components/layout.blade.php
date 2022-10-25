<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/scss/main.scss'])

    </head>
    <body>
        <x-message></x-message>
        <header></header>
        <main>
            <h1>Gästebuch</h1>
            {{$slot}}
        </main>
        <footer></footer>
    </body>
</html>
