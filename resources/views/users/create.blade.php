<x-layout>
    <h2 class="py-5">Hier können Sie sich als neuen Nutzer registrieren.</h2>
    <form method="POST" action="/Nutzer">
        @csrf
        <div class="d-flex flex-column mb-4">
            <label class="mb-2" for="name">Name</label>
            <input name="name" placeholder="Name" value="{{old('name')}}">
            @error('name')
                <p class="error-text"{{$message}}></p>
            @enderror
        </div>
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
            @error('password_confirmation')
		        <p class="error-text">{{$message}}</p>
	        @enderror
        </div>
        <div class="d-flex flex-column mb-4">
            <label class="mb-2" for="password_confirmation">Passwort wiederholen</label>
            <input name="password_confirmation" placeholder="Passwort wiederholen">
        </div>
        <button type="submit" class="btn btn-success">Registrieren</button>
    </form>
</x-layout>