<div class="d-flex flex-column flex-shrink-0 p-3 sidebarCustom" style="width: 280px;">
    <a class="navbar-brand text-center fs-3" href="{{route('article.index')}}">
        <img src="{{ asset ('images\logo.jpg') }}" alt="Logo" width="45" height="40" class="logo d-inline-block align-text-top">
        Rebels
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        @foreach ($categories as $category)
            <li class="nav-item mt-3">
                <a href="{{ route('articles.filterByCategory', ['category' => $category->id]) }}" class="sideItemCustom">
                    <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

