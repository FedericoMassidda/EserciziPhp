<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    // function shop
    public function shop(){
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('articles.shop', compact('articles'));
    }
    // function personalArea
    public function personalArea(){
        $user = Auth::user();
        $articles = $user->articles;
        return view('personalArea', compact('user', 'articles'));
    }

    // function filtra per categoria
    public function filterByCategory($categoryId)
    {
        // Recupera la categoria selezionata
        $category = Category::findOrFail($categoryId);

        // Recupera tutti gli articoli che appartengono a quella categoria
        $articles = $category->article; // Assumendo che tu abbia la relazione 'articles' nel modello Category

        // Ritorna una vista che mostra gli articoli filtrati
        return view('articles.categories', compact('articles', 'category'));
    }

    // function searchbar
    public function searchArticles(Request $request)
    {
        // Ottieni la query dalla richiesta
        $query = $request->input('query');
        
        // Esegui la ricerca negli articoli e filtra solo quelli accettati
        $articles = Article::search($query)
                    ->where('is_accepted', true)
                    ->paginate(10);
        
        // Ritorna la vista 'article.searched' con gli articoli trovati e la query
        return view('articles.searched', [
            'articles' => $articles,
            'query' => $query,
        ]);
    }


        //funzione per la lingua- rotta POST associata al componenente _locale

        public function setLanguage($lang)
        {
            session()->put('locale', $lang);
            return redirect()->back();
        }
}
