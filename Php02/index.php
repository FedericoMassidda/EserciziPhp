<?php
// Traccia 1
// Scrivere un programma che, utilizzando il costrutto if , stampi a terminale un messaggio appropriato quando una variabile $number è:
// - negativa
// - positiva ma minore di 15
// - maggiore o uguale a 15
// - uguale a 0
// $number = 15; //dichiaro la variabile
// if($number >= 15){ // impongo la condizione che deve verificare se il numero è >=15
//     echo "Il numero equivale a: $number, risulta essere maggiore o uguale di 15.";
// }elseif($number > 0 && $number < 15){ // impongo la condizione che deve verificare se il numero è compreso tra 1 e 14 (quindi <15 ma comunque positivo)
//     echo "Il numero equivale a: $number, risulta essere positivo ma minore di 15.";
// }elseif($number == 0){ // impongo la condizione che deve verificare se il numero è == 0
//     echo "Il numero equivale a: $number.";
// }else{ // qua sono compresi tutti gli altri casi (quindi solo i numeri negativi)
//     echo "Il numero equivale a: $number, risulta essere un numero negativo.";
// }

// Traccia 2
// Scrivere un programma che stampi a terminale i primi 50 numeri pari sfruttando il ciclo for.
// Ripeti l'esercizio utilizzando il ciclo while, ma stampando i prima 50 numeri dispari
// for($i = 0; $i <= 50; $i++){ //ciclo for per i numeri pari
//     if($i % 2 == 0){ // if per controllare se il mio numero è pari o dispari
//         echo $i . "\n"; //se è dispari lo stamperà
//     }
// }
// ciclo while per i numeri dispari
// mi creo due variabili, una per i numeri dispari e una è il counter dei cicli che dovrà fare il while
// $odd = 0;
// $count = 0;
// while($count < 50){ //impongo la condizione per il ciclo while, finchè sarà false, continuerà a ciclare
//     if($odd % 2 != 0){ //check del numero
//         echo $odd . "\n"; // se è dispari stampa in console
//     }
//     // incremento di 1 i counter
//     $count++;
//     $odd++;
// }

// Traccia 3
// Scrivere un programma che stampi in console tutti i numeri da uno a cento.
// Se il numero è multiplo di 3 stampare “PHP” al posto del numero; se multiplo di 5 stampare “JAVASCRIPT”; 
// se multiplo di 3 e 5 contemporaneamente deve stampare “HACKADEMY".
// for($i = 0; $i <= 100; $i++){ // uso il for per creare un ciclo che arrivi a 100
//     if($i % 3 == 0 && $i % 5 == 0){ // controllo se il numero è multiplo sia di 3 che di 5 stampo "HACKADEMY"
//         echo "HACKADEMY \n";
//     }elseif($i % 5 == 0){ // controllo se il numero è multiplo di 5 stampo "JAVASCRIPT"
//         echo "JAVASCRIPT \n"; 
//     }elseif($i % 3 == 0){ // controllo se il numero è multiplo di 3 stampo "PHP"
//         echo "PHP \n";
//     }else{ // per tutti gli altri casi che non hanno multipli stampo il relativo numero
//         echo $i . "\n"; 
//     }
// }

// Traccia 4
// Dato un array contenente una serie di array associativi di utenti con nome, cognome e genere, per ogni utente stampare,
// utilizzando un costrutto switch, “Buongiorno Sig. Nome Cognome” o “Buongiorno Sig.ra Nome Cognome” o “Buongiorno Nome Cognome” a seconda del genere.
// creo un array associativo con le varie persone
// $users = [
//     ['name' => 'Gustavo', 'surname' => 'Lapasta', 'gender' => 'M'],
//     ['name' => 'Alfredo', 'surname' => 'Dalcaldo', 'gender' => 'NB'],
//     ['name' => 'Rosa', 'surname' => 'Foglio', 'gender' => 'F'],
//     ['name' => 'Assunta', 'surname' => 'Manno', 'gender' => 'F'],
//     ['name' => 'Nunzio', 'surname' => 'Ciri', 'gender' => 'NB'],
//     ['name' => 'Lino', 'surname' => 'Sasso', 'gender' => 'M'],
//     ['name' => 'Ester', 'surname' => 'Poli', 'gender' => 'F'],
// ];
// // creo un ciclo foreach
// foreach($users as $key => $user){ // ciclo l'array prendendo chiave e valore
//     // creo un controllo sul genere inserito dall'utente
//     switch($user['gender']){
//         case 'M': // se è M, la scritta sarà custom con "Sig."
//             echo "Buongiorno Sig. {$user['surname']} {$user['name']} \n";
//             break; // esco dal ciclo
//         case 'F': // se è F, la scritta sarà custom con "Sig.ra"
//             echo "Buongiorno Sig.ra {$user['surname']} {$user['name']} \n";
//             break; // esco dal ciclo
//         default: //qua subentra qualsiasi altro caso che non sia M o F
//             echo "Buongiorno {$user['surname']} {$user['name']} \n";
//     }
// }

// Traccia 5
// Creare una variabile $temperatura ed utilizzando if elseif ed else in base alle necessità, 
// stampare il testo “Fa freddo" se il valore contenuto in temperatura è minore di 15 gradi.
// Stampare il testo "Fa caldo" se la temperatura è maggiore o uguale a 15 gradi.
// Utilizzando if else, e modificando opportunamente quanto già scritto, aggiungere la stampa del testo "Fa molto caldo" se la temperatura supera i 25 gradi.
// Infine, modificando il codice scritto in precedenza, utilizza il seguente array e stampa per ogni elemento dell'array la stringa

// $temperature = [ // array associativo contenente le varie città con le rispettive temperature
//     "Venezia" => 16, "Bari" => 32,
//     "Roma" => 28, "Napoli" => 30,
//     "Milano" => 4, "Palermo" => 14,
//     "Torino" => 24, "Roccaraso" => -5000,
//     "Lecce" => 27, "Genova" => 30,
//     "Catania" => 11, "Cosenza" => 9
// ];
// ciclo l'array prendendo sia chiave che valore
// foreach($temperature as $key => $degrees){
//     // sfrutto il valore per fare il check, e la chiave nell'echo per richiamare la città
//     if($degrees < -1000){
//         echo "A $key meglio mettere una felpina, ci sono $degrees °C \n";
//     }elseif($degrees > 25){
//         echo "A $key fa molto caldo, ci sono $degrees °C \n";
//     }elseif($degrees >= 15 && $degrees < 25){
//         echo "A $key fa caldo, ci sono $degrees °C \n";
//     }elseif($degrees < 15){
//         echo "A $key fa freddo, ci sono $degrees °C \n";
//     }
// }

// Traccia 6
// Dato un array di numeri a scelta, scrivere un programma che calcoli la media solo dei numeri pari contenuti all’interno dell’array.
// creo l'array di numeri
$array = [5 ,7, 12, 4, 32, 16, 55, 44];
// variabile d'appoggio
$num = 0;
$counter = 0;
// foreach per ciclare l'array
foreach($array as $number){
    if($number % 2 == 0){
        $num += $number;
        $counter++;
    }
}
echo $num / $counter;

// Traccia 7
// Scrivi un programma che calcoli e stampi a terminale la lunghezza di una stringa senza utilizzare la funzione strlen()
$string = 'Ciao a tutti HKPT 37!';
$counter = 0;
// nel ciclo for sfrutto l'isset per controllare effettivamente quando l'indice corrente esiste nella stringa, e incremento la variabile counter ad ogni giro.
for($i = 0; isset($string[$i]); $i++){
    $counter++;
}
// una volta finito il ciclo all'interno di counter avrò sempre la lungezza esatta della mia stringa e non mi resta che stamparla a console.
echo "La stringa ( $string ) è lunga $counter caratteri.";