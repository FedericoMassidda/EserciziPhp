<x-layout>
    <div class="container ">
        <div class="row">
            @foreach ($articles as $article)
                <x-card :article="$article"/>
            @endforeach
        </div>
    </div>
</x-layout>