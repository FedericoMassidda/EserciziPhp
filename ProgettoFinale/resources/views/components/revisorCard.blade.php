<div class="container mb-5">
    <div class="row mt-5">
        <div class="col-md-7">
            <div id="carouselExample" class="revisorCarousel slide" data-bs-ride="carousel">
                <div class="carousel-inner-custom">
                    @if ($article->images->count())
                        @foreach ($article->images as $image)
                            <div class="carousel-item active">
                                <img src="{{Storage::url($image->path)}}" class="d-block w-100" alt="Immagine articolo">
                            </div>
                        @endforeach
                    @else
                        @for ($i = 0; $i < 6; $i++)
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/{{400+$i}}" class="d-block w-100" alt="Immagine">
                            </div>
                        @endfor
                    @endif
                </div>
                <!-- Controlli del carosello -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">{{__('ui.previous')}}</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">{{__('ui.next')}}</span>
                </button>
            </div>
        </div>
        <div class="col-md-5">
            <h3 class="mt-2">{{$article->title}}</h3>
            <h5 class="mt-3">{{$article->category->name}}</h5>
            <h4 class="mt-3">€{{$article->price}}</h4>
            <p class="mt-3">{{$article->description}}</p>
        </div>
    </div>
</div>