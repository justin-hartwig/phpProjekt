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
                        <ul class="navbar-nav align-items-center">
                            @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/bookentrys/verwalten">Einträge verwalten</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="/abmelden">
                                    @csrf
                                    <button class="btn btn-inline nav-link" type="submit">
                                        Abmelden
                                    </button>
                                </form>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="/anmelden">Anmelden</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/registrieren">Registrieren</a>
                            </li>
                            @endauth
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
                    {{$slot}}
                </div>
            </div>
        </main>
        <footer class="py-5 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-10 d-flex flex-column justify-content-end">
                        <a href="https://www.die-waldhuette.de/impressum/" class="mb-3 d-block">Impressum</a>
                        <h3>Wir freuen uns auf Sie!</h3>
                    </div>
                    <div class="col-12 col-sm-2 pt-3 pt-sm-0">
                        <a class="footer-brand" href="/"><img src="/images/logo-die-waldhuette.svg" alt="Logo Die Waldhütte"></a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
