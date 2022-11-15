<x-layout>
    <h2 class="py-5">Hier können Sie sich anmelden.</h2>
    <form method="POST" action="/Nutzer/authentifizieren">
        @csrf
        <div class="d-flex flex-column mb-4">
            <label class="mb-2" for="email">Email</label>
            <input name="email" placeholder="Email" value="{{old('email')}}">
            @error('email')
		        <p class="error-text">{{$message}}</p>
	        @enderror
        </div>
        <div class="d-flex flex-column mb-4">
            <label class="mb-2" for="password">Passwort</label>
            <input name="password" placeholder="Passwort">
            @error('password')
		        <p class="error-text">{{$message}}</p>
	        @enderror
        </div>
        <button type="submit" class="btn btn-success btn-icon mb-4"><img src="/images/icons/log-in.svg" alt="Icon anmelden">Anmelden</button>
        <p>Sie haben noch keinen Account? <a href="/registrieren">Hier</a> können Sie sich registrieren.</p>
    </form>
</x-layout>