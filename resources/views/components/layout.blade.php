<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Gästebuch - Die Waldhütte</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Vite Includs -->
        @vite(['resources/scss/main.scss', 'resources/js/app.js'])

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
                                @if (auth()->user()->is_admin)
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/Eintraege/verwalten"><img src="/images/icons/notes.svg" alt="Icon verwalten">Einträge verwalten</a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/Eintraege/verwalten"><img src="/images/icons/notes.svg" alt="Icon verwalten">Einträge verwalten</a>
                                </li>
                                @endif
                            <li class="nav-item">
                                <form method="POST" action="/abmelden">
                                    @csrf
                                    <button class="btn btn-inline nav-link btn-icon" type="submit">
                                        <img src="/images/icons/log-out.svg" alt="Icon abmelden">
                                        Abmelden
                                    </button>
                                </form>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="/anmelden"><img src="/images/icons/log-in.svg" alt="Icon anmelden">Anmelden</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/registrieren"><img src="/images/icons/user-plus.svg" alt="Icon registrieren">Registrieren</a>
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
