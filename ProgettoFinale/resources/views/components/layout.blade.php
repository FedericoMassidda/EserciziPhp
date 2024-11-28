<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Ocean games</title>
    </head>
    <body class="bodyBackground"> <!-- Richiamo il colore che ho impostato tramite il root nel mio style.css -->
        {{-- <x-navbar /> --}}
        <x-newNavbar/>
        <main>
            {{$slot}}
        </main>
         <x-footer/>
    </body>
</html>
