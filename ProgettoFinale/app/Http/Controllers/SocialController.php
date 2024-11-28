<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    //
}


use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    // Reindirizza l'utente a Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Gestisci il callback da Facebook
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        // Logica per registrare o loggare l'utente
    }

    // Reindirizza l'utente a Instagram
    public function redirectToInstagram()
    {
        return Socialite::driver('instagram')->redirect();
    }

    // Gestisci il callback da Instagram
    public function handleInstagramCallback()
    {
        $user = Socialite::driver('instagram')->user();
        // Logica per registrare o loggare l'utente
    }
}
