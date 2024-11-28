<x-layout>
    <div class="container pageWrapper vh-100 pt-5">
        <h1 class="text-center">{{__('ui.revision')}}</h1>
        @if (session()->has('revMessage'))
            <div class="alert alert-secondary d-flex justify-content-between align-items-center">
                <p>L'azione è andata a buon fine.</p>
                <form action="{{route('cancel')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{session('revMessage')}}" id="">
                    <button type="submit" class="btn btn-secondary ms-auto">Annulla</button>
                </form>
            </div>
        @endif
        <div class="row justify-content-center">
            @if ($article_to_check)
            <x-revisorcard :article="$article_to_check" />
            <div class="d-flex justify-content-center">
                <form action="{{route('accept', ['article' => $article_to_check])}}" method="POST" class="mt-4 mb-5 me-5">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success btnRevisorCustom">{{__('ui.accept')}}</button>
                </form>
                <form action="{{route('reject', ['article' => $article_to_check])}}" method="POST" class="mt-4 mb-5">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger btnRevisorCustom">{{__('ui.reject')}}</button>
                </form>

                <!-- Parte per YouTube -->
                

<!-- <div class="container">
    <h1>Inserisci il link del trailer</h1>
    <form action="{{ route('trailer.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="youtube_link">Link YouTube:</label>
            <input type="text" id="youtube_link" name="youtube_link" class="form-control" placeholder="Inserisci il link del trailer" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Invia</button>
    </form>
</div> -->


                @else
                <div class="col-12 mt-5">
                    <h2 class="text-center">{{__('ui.NA')}}</h2>
                </div>
                @endif
            </div>
        </div>
</x-layout>
