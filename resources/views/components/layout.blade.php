<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gästebuch - Die Waldhütte</title>

        <!-- Vite Includs -->
        @vite(['resources/scss/main.scss', 'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js'])

    </head>
    <body>
        <x-message></x-message>
        <header>
            <div class="container">
                <div class="row">
                    <nav class="navbar">
                        <a class="navbar-brand" href="/"><img src="/images/logo-die-waldhuette.svg" alt="Logo Die Waldhütte"></a>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Registrieren</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center py-5">Gästebuch</h1>
                    </div>
                </div>  
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        {{$slot}}
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-5 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-10 d-flex flex-column justify-content-end">
                        <a href="https://www.die-waldhuette.de/impressum/" class="mb-3 d-block">Impressum</a>
                        <h3>Wir freuen uns auf Sie!</h3>
                    </div>
                    <div class="col-2">
                        <a class="footer-brand" href="/"><img src="/images/logo-die-waldhuette.svg" alt="Logo Die Waldhütte"></a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
