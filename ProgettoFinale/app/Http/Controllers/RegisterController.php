<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class RegisterController extends Controller
{
    // Funzione per richiama la vista blade // 
    public function register()
    {

        return view('auth.register');
    }

    // Funzione per eseguire il submit //
    public function submitapplication(Request $request)
    {

        //dd($request->all());
        // Validazione del form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Creazione dell'utente e salvataggio nel database
        $users = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Cripta la password
        ]);

        // Dettagli dell'email
        $contact = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        // Invia l'email
        $contact = $request->all();
        Mail::to( $contact['email'])->send(new RegisterMail($contact));
        
        // Messaggio di conferma //
        session()->flash('success', 'Registrazione avvenuta con successo!');
        return redirect()->route('login');
    }
}