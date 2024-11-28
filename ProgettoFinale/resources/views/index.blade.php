<div class="bodyBackgroundindex v-100">
    <x-layout>
    
    {{-- normale --}}
    {{-- <x-sidebar/>
    <div class="container ">
        <div class="row ">
            @foreach ($articles as $article)
                <x-card :article="$article"/> 
            @endforeach
        </div>
    </div> --}}
    {{-- carosello --}}
    <div id="carouselExample" class="carousel slide carouselCustom" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($articles as $article)
                <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                    <x-indexCardCarousel :article="$article"/>
                </div>
            @endforeach
        </div>
            {{-- @foreach ($article->images as $key => $image)
            <div class="col-6 col-md-4 mb-4 text-center">
                <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded shadow" alt="Immagine {{$key + 1 }} dell'articolo {{ $article_to_chack->title }}">
            </div>
            @endforeach --}}
        </div>    
    </div>
    <!-- <x-footer/> -->
</x-layout>
</div>