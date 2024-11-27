<?php
// Creare una funzione per la verifica di una password, dovrà rispettare criteri:
// avere almeno una lettera maiuscola,
// avere almeno un carattere numerico 
// lunghezza di 8+ caratteri.

// variabile che contiene la password
$password = 'Ciao1234';

// FUNZIONI PER I CHECK \\
// creo la funzione che controlla che sia presente almeno una lettera maiuscola
function capitalCheck($password){
    // splitto la stringa in un array formato da ogni lettera della stringa
    $caratteri = str_split($password);
    // ciclo l'array e controllo se è presente una maiuscola, facendomi tornare true in caso sia presente
    foreach($caratteri as $carattere){
        if(ctype_upper($carattere)){
            return true;
        }
    }
    // se non sono presenti maiuscole mi tornerà false
    return false;
}
// creo una funzione che controlla se sia presente almeno un carattere numerico, si comporta praticamente allo stesso modo della funzione capitalCheck()
function numberCheck($password){
    // splitto la stringa in un array formato da ogni lettera della stringa
    $caratteri = str_split($password);
    // ciclo l'array e controllo se è presente un numero, facendomi tornare true in caso sia presente
    foreach($caratteri as $carattere){
        if(ctype_digit($carattere)){
            return true;
        }
    }
    // se non è presente un numero mi tornerà false
    return false;
}
// creo una funzione che controlla se la mia password è >= 8 caratteri
function lenghtCheck($password){
    if(strlen($password) >= 8){
        return true;
    }else{
        return false;
    }
}
// FINE FUNZIONI PER I CHECK \\
// Creo la funzione che verifica se la password rispetta tutti i criteri
function passwordCheck($password){
    if(capitalCheck($password) && numberCheck($password) && lenghtCheck($password)){
        echo 'La password inserita rispetta i nostri criteri.';
    }else{
        echo "La password inserita NON rispetta i nostri criteri, controlla che:\n- Sia presente almeno una lettera maiuscola;\n- Sia presente almeno un carattere numerico;\n- La lunghezza sia almeno di 8 caratteri.";
    }
}
// passwordCheck($password);

// REFACTORING CODICE

// Invece di salvarmi in una variabile un array composto da ogni singolo carattere della password, e poi ciclarlo e fare il controllo, 
// utilizzo direttamente la funzione preg_match con i rispettivi regex che mi servono, aggiungo il type hinting per avere un codice più robusto.
function containsUppercase(string $password):bool{ 
    return (bool) preg_match('/[A-Z]/', $password);
}

function containsNumber(string $password):bool{
    return (bool) preg_match('/\d/', $password);
}

function validateLength(string $password):bool{
    return strlen($password) >= 8;
}

// utilizzo :void perchè la funzione non prevede un valore di ritorno
function validatePassword(string $password) :void{
    if(containsUppercase($password) && containsNumber($password) && validateLength($password)){
        echo 'La password inserita rispetta i nostri criteri.';
    }else{
        echo "La password inserita NON rispetta i nostri criteri, controlla che:\n- Sia presente almeno una lettera maiuscola;\n- Sia presente almeno un carattere numerico;\n- La lunghezza sia almeno di 8 caratteri.";
    }
}
$password= 'cCcccccc1';
validatePassword($password);
