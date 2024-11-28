<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; // Assicurati di importare il modello corretto

class TrailerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'youtube_link' => 'required|url',
        ]);

        // Supponendo che tu stia salvando il link nel modello Game
        $game = Article::findOrFail($request->game_id); // Assicurati di passare l'ID del gioco
        $game->youtube_link = $request->youtube_link;
        $game->save();

        return redirect()->back()->with('success', 'Trailer aggiunto con successo!');
    }
}
