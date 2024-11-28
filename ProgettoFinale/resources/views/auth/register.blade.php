<x-layout>
    <div class=" d-flex justify-content-center">
        <img src="{{ asset ('images\logo.jpg') }}" alt="Logo" width="100" height="100" class="rounded-circle  mb-2">
    </div>
    <!-- validazione della registrazione -->
    <div class="col-12 mt-3 d-flex justify-content-center vh-100">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('register')}}" method="POST" class="form">
            @csrf
            <div class="container">
                <h1 class="h3 mb-3 fw-normal text-black">{{__('ui.registration')}}</h1>
                <p class="mt-2 mb-4 text-black">{{__('ui.enter')}}</p>

                <div class="form-floating mb-3 ">
                    <input type="text" name="name" class="form-control" id="Name" placeholder="Enter Full Name" required>
                    <label for="name">{{__('ui.Name')}}</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" placeholder="Enter Email" name="email" class="form-control" id="email" required>
                    <label for="email">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" placeholder="Enter Password" name="password" class="form-control" id="password" required>
                    <label for="password">{{__('ui.Pass')}}</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" placeholder="Repeat Password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                    <label for="password_confirmation">{{__('ui.Password')}}</label>
                </div>

                <div class="form-floating mb-3">
                    <p class="mt-3 mb-3 text-white">By creating an account you agree to our <a href="#" class="text-white">Terms & Privacy</a></p>
                    <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
                    <p class="mt-3 mb-3 text-black"></p>
                </div>
            </div>
        </form>
    </div>
</x-layout>