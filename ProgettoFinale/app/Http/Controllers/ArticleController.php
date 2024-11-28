<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        // Con utente autenticato mostra tutti gli articoli dal pu recente
        // if (Auth::check()) {
        //     $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get(); 
        // } else {
        //     // Con utente non autenticato, mostra solo 6 articoli dal pi+ recente
        //     $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get(); 
        // }
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get(); 

        return view('index', compact('articles'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
        
        $game = Article::findOrFail($id);
         return view('articles.show', compact('game'));
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article')); 
    }

    /**
     * Update the specified resource in storage.
     */


    function getYoutubeId($url) {
        parse_str(parse_url($url, PHP_URL_QUERY), $query);
        return isset($query['v']) ? $query['v'] : null;
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back()->with('success', 'Articolo eliminato con successo');
    }
}

// class YoutubeController extends Controller
// {
//     public function update(Request $request, $id)
//     {
//         // Validazione del link YouTube
//         $request->validate([
//             'youtube_link' => 'nullable|url',
//         ]);

//         $article = Article::findOrFail($id);
//         $youtubeEmbedUrl = getYoutubeEmbedUrl($request->input('youtube_link'));

//         // Aggiornamento dell'articolo con il link YouTube incorporato
//         $article->update([
//             'youtube_link' => $youtubeEmbedUrl,
//         ]);

//         return redirect()->back()->with('success', 'Link del trailer salvato correttamente');
//     }
// }