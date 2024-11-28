<x-layout>
    <div class=" d-flex justify-content-center">
        <img src="{{ asset ('images\logo.jpg') }}" alt="Logo" width="100" height="100" class="rounded-circle mt-2 mb-4">
    </div>

    <!-- validazione del login -->
    @if ($errors->any())
    <div class=" alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach
    </div>
    @endif
    
    <div class="col-12 mt-3 d-flex justify-content-center vh-100">
        <form method="POST" action="{{route('login')}}" class="form">
            @csrf
            <div class="container">
                <h1 class="h3 mb-3 fw-normal text-black">{{__('ui.signin')}}</h1>

                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label text-black" for="flexCheckDefault">{{__('ui.remember')}}</label>
                </div>

                <button class="btn btn-primary w-100 py-2" type="submit">{{__('ui.signin')}}</button>
                <p class="mt-3 mb-3 text-black"></p>

                <a href="{{ route('google.redirect') }}" class="btn btn-primary"> {{__('ui.google')}} </a>
                
            </div>

            <!-- Messaggio di successo -->
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
        </form>

        

    

</x-layout>