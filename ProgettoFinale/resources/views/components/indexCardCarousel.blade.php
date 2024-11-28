<div class="indexCardCarouselWrapper mt-5 ms-5">
    <a class="indexCarouselAnchor" href="{{route('articles.show', ['article'=>$article->id])}}">
        <img class="indexCardImg" src="{{$article->images->isNotEmpty() ? Storage::url($article->images->first()->getUrl(300, 300)) : 'https://picsum.photos/' . 300 +$article->id}}" alt="">
        <div class="d-flex justify-content-between align-items-center indexCardText">
            <h3>{{$article->title}}</h3>
            <h5>€ {{$article->price}}</h5>
        </div>
    </a>
</div>
