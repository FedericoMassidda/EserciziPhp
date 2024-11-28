<?php
// Creare una funzione per la verifica di una password, dovrà rispettare criteri:
// avere almeno una lettera maiuscola,
// avere almeno un carattere numerico 
// lunghezza di 8+ caratteri.


$password= 'A123456b';

function test(string $password){
    if(preg_match('/[A-Z]/', $password) && preg_match('/\d/', $password) && strlen($password) >= 8){
        echo 'La password inserita rispetta i nostri criteri.';
    }else{
        echo "La password inserita NON rispetta i nostri criteri, controlla che:\n- Sia presente almeno una lettera maiuscola;\n- Sia presente almeno un carattere numerico;\n- La lunghezza sia almeno di 8 caratteri.";
    }
}

test($password);