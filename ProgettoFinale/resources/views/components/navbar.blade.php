<nav class="navbar" aria-label="First navbar example" style="background-color: var(--primaryColor1);">
    <div class="container-fluid">
        <button class="navbar-toggler me-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- logo -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset ('images\logo.jpg') }}" alt="Logo" width="35" height="30" class="logo d-inline-block align-text-top">
            Rebels
        </a>
        <!-- form di ricerca -->
        <form class="d-flex me-auto" role="search" action="{{ route('article.search') }}" method="GET">
            <div class="input-group">
                <input type="search" name="query" class="form-control" placeholder="Cerca nel sito" aria - label="search">
                <button type="submit" class="input-group-text btn btn-outline-primary" id="basic-addon2">
                    <svg width="20" height="20" class="DocSearch-Search-Icon" viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M14.386 14.386l4.0877 4.0877-4.0877-4.0877c-2.9418 2.9419-7.7115 2.9419-10.6533 0-2.9419-2.9418-2.9419-7.7115 0-10.6533 2.9418-2.9419 7.7115-2.9419 10.6533 0 2.9419 2.9418 2.9419 7.7115 0 10.6533z" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    {{__('ui.Search')}}
                </button>
            </div>
        </form>

        <!-- lingue -->
        <x-_locale lang="it" />
        <x-_locale lang="en" />
        <x-_locale lang="es" />
        <!-- logo -->
        <a class="navbar-brand" href="{{route('article.index')}}">
            <img src="{{ asset ('images\logo.jpg') }}" alt="Logo" width="35" height="30" class="logo d-inline-block align-text-top">
            Rebels
        </a>
        <div class="navbar-collapse collapse" id="navbarsExample01">
            <ul class="navbar-nav me-auto mb-2">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('article.index')}}">Homepage</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.Categories')}}</a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{ route('articles.filterByCategory', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person"></i>
                        {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        @if (Auth::user()->is_revisor)
                        <li><a class="dropdown-item" href="{{route('revisor.index')}}">{{__('ui.Privatearea')}}</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{route('articles.create')}}">{{__('ui.Createarticle')}}</a></li>
                        <li class="dropdown-item">
                            <form action="{{ route('workwithus') }}" method="GET">
                                <button type="submit" class="btn btn-outline-danger">{{__('ui.Workwithus')}}</button>
                            </form>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else
                {{-- guest --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person"></i>
                        {{__('ui.user')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                        <li><a class="dropdown-item" href="{{route('register')}}">{{__('ui.Signup')}}</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>