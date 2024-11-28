<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::with('images')->where('is_accepted', null)->orderBy('created_at', 'desc')->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        session()->flash('revMessage', $article->id); //cambiare revMessage con accept e reject, messaggio statico con P, 2 if differenti
        return redirect()->back()->with("L'annuncio $article->title è stato accettato");
        
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        session()->flash('revMessage',  $article->id); //'Articolo rifiutato con successo!',
        return redirect()->back()->with("L'annuncio $article->title è stato rifiutato");
    }

    public function cancel(Request $request){
        $article = Article::find($request->id);
        $article->setAccepted(null);
        return redirect()->back();
    }
    // Validazione del link di YouTube
//     $request->validate([
//         'youtube_link' => 'nullable|url'
//     ]);

//     // Imposta il link di YouTube
//     $article->youtube_link = $request->youtube_link;
//     $article->setAccepted(true);
//     $article->save();

//     session()->flash('revMessage', 'Articolo accettato con successo!');
//     return redirect()->back()->with("L'annuncio $article->title è stato accettato");
// }

}
