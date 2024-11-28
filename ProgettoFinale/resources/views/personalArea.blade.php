<x-layout>
    {{-- @foreach ($articles as $article)
        <h1>{{$article->title}}</h1>
    @endforeach --}}
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-striped table-sm p-4">
                <thead>
                    <tr>
                    <th class="pt-3 ps-3 pb-3" scope="col">#ID</th>
                    <th class="pb-3" scope="col">Titolo</th>
                    <th class="pb-3" scope="col">Categoria</th>
                    <th class="pb-3" scope="col">Prezzo</th>
                    <th class="pb-3" scope="col"></th>
                    <th class="pb-3" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td class="ps-3">{{$article->id}}</td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->category->name}}</td>
                            <td>{{$article->price}}</td>
                            <td>
                                <a href="{{route('articles.edit', compact('article'))}}">
                                    <button type="button" class="btn btn-light">Modifica</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('articles.destroy', compact('article'))}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>