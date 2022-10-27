<x-layout>
    <h2>Hier können Sie sich anmelden.<h2>
    <form method="POST" action="/Nutzer/authentifizieren">
        @csrf
        <label for="email">Email</label>
        <input name="email" placeholder="Email" value="{{old('email')}}">
        @error('email')
		    <p class="error-text">{{$message}}</p>
	    @enderror
        <label for="password">Passwort</label>
        <input name="password" placeholder="Passwort">
        @error('password')
		    <p class="error-text">{{$message}}</p>
	    @enderror
        <button type="submit" class="btn btn-success">Anmelden</button>
        <p>Sie haben noch keinen Account? <a href="/registrieren">Hier</a> können Sie sich registrieren.</p>
    </form>
</x-layout>