<nav class="navbar navbarCustom navbar-expand-lg">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <form class="d-flex me-auto" role="search" action="{{ route('article.search') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="query" class="form-control" placeholder="Cerca nel sito" aria - label="search">
                        <button type="submit" class="input-group-text btnSearchCustom btn btn-outline-primary" id="basic-addon2">
                            <svg width="20" height="20" class="DocSearch-Search-Icon" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M14.386 14.386l4.0877 4.0877-4.0877-4.0877c-2.9418 2.9419-7.7115 2.9419-10.6533 0-2.9419-2.9418-2.9419-7.7115 0-10.6533 2.9418-2.9419 7.7115-2.9419 10.6533 0 2.9419 2.9418 2.9419 7.7115 0 10.6533z" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            {{__('ui.Search')}}
                        </button>
                    </div>
                </form>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('article.index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('articles.shop')}}">{{__('ui.shop')}}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('articles.filterByCategory', ['category' => $category->id]) }}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('articles.create')}}">{{__('ui.Createarticle')}}</a>
                </li>
                @endauth
                @guest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle ms-auto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu dropdownCustom">
                        <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                        <li><a class="dropdown-item" href="{{route('register')}}">{{__('ui.Signup')}}</a></li>
                        <hr>
                        <div class="d-flex align-items-center">
                            <x-_locale lang="it" />
                            <p class="mt-3">Italiano</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <x-_locale lang="en" />
                            <p class="mt-3">English</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <x-_locale lang="es" />
                            <p class="mt-3">Español</p>
                        </div>
                    </ul>
                </li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle ms-auto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </a>
                    <ul class="dropdown-menu dropdownCustom">
                        <li>
                            <p class="text-center">{{__('ui.ciao')}} {{Auth::user()->name}}</p>
                        </li>
                        <hr>
                        <li><a class="dropdown-item" href="{{route('personalArea')}}">{{__('ui.Privatearea')}}</a></li>
                        @if (Auth::user()->is_revisor)
                        <li><a class="dropdown-item" href="{{route('revisor.index')}}">{{__('ui.Privatearea')}}</a></li>
                        @endif
                        <li><a class="dropdown-item text-center" href="{{route('articles.create')}}">{{__('ui.Createarticle')}}</a></li>
                        @if (!Auth::user()->is_revisor)
                            <li>
                                <form action="{{ route('workwithus') }}" method="GET">
                                    <button type="submit" class="btn btn-outline-success btnDropdownCustom">{{__('ui.Workwithus')}}</button>
                                </form>
                            </li>
                        @endif
                        <li>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btnDropdownCustom">Logout</button>
                            </form>
                        </li>
                        <hr>
                        <div class="d-flex align-items-center">
                            <x-_locale lang="it" />
                            <p class="mt-3">Italiano</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <x-_locale lang="en" />
                            <p class="mt-3">English</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <x-_locale lang="es" />
                            <p class="mt-3">Español</p>
                        </div>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- x tania -->