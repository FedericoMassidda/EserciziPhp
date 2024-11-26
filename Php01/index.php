<?php
// Traccia 1
// Definisci poi 4 variabili: Integer Float String Boolean 
// A schermo, fai comparire il tipo di dato e contenuto delle varie variabili utilizzando il metodo var_dump() 
$integer = 52;
$float = 6.67;
$string = "Ciao, sono Federico"; 
$bool = true;
// stampo a terminale le variabili
// var_dump($integer, $float, $string, $bool);

// Traccia 2
// Date le seguenti variabili:
    // $1text = "Marco"; 
    // $text2 = "hai"; 
    // $text.3 = "sete"; 
    // $text4 = "?"; 
    // @text5 = "Perchè"; 
    // $te-xt6 = '$text2'; 
    // $text 7 = 'bevuto'; 
    // $text8 = "tutto" 
// Correggi eventuali errori presenti nel codice (aiutati leggendo gli errori segnalati nel terminale all'esecuzione del programma) 
// E stampa correttamente a terminale la stringa: "Marco hai sete? Perche' hai bevuto tutto."
$text1 = "Marco"; 
$text2 = "hai"; 
$text3 = "sete"; 
$text4 = "?"; 
$text5 = "Perchè"; 
$text6 = '$text2'; 
$text7 = 'bevuto'; 
$text8 = "tutto";
// riassegno la variabile $text6
$text6 = 'hai';
// stampo a terminale la frase.
// echo $text1 . ' ' . $text2 . ' ' . $text3 . $text4 . ' ' . $text5 . ' ' . $text6 . ' ' . $text7 . ' ' . $text8 . '.';

// Traccia 3
// Dato un array crea una variabile di tipo Stringa chiamata $results che stampi a terminare il seguente testo, 
// attraverso l’accesso agli array sopra: "Nel mezzo di cammin di nostra vita mi ritrovai per una selva oscura, che' la diritta via era smarrita".
$words1 = [ 
    'una', 
    67, 
    'vita', 
    'colle',
    'mi', 
    'rosso', 
    [
        'oscura', 
        'era', 
        89, 
        [ 
            'mezzo',
            [ 
                'cammin', 
                'Nel', 
                [ 
                    'selva', 
                    'la', 
                    [
                        'via', 
                        'una', 
                        true, 
                    ] 
                ],
            ] 
        ], 
        'ritrovai', 
        'per' 
    ], 
    'diritta' 
]; 
$words2 = [ 
    'elemento1' => 25.89, 
    'elemento2' => 'nostra', 
    'elemento3' => [ 
        'Virgilio', 
        'smarrita', 
        'ché' 
    ] 
];
// creo un array con la parola mancante
$words3 = [
    'missing1' => 'di'
];
// concateno in una variabile la stringa per comporre la frase
$results = "{$words1[6][3][1][1]} {$words1[6][3][0]} {$words3['missing1']} {$words1[6][3][1][0]} {$words3['missing1']} {$words2['elemento2']} {$words1[2]} {$words1[4]} {$words1[6][4]} {$words1[6][5]} {$words1[0]} {$words1[6][3][1][2][0]} {$words1[6][0]}, {$words2['elemento3'][2]} {$words1[6][3][1][2][1]} {$words1[7]} {$words1[6][3][1][2][2][0]} {$words1[6][1]} {$words2['elemento3'][1]}.";
// stampo a terminale la variabile contenente la stringa
// echo $results;

// Traccia 4
// Create 4 variabili utilizza var_dump() per visualizzare l'esito dei seguenti confronti: <, <=, ==, ===, !==, !=
$x = 10;
$y = 20;
$z = '20';
$w = '10';
// var_dump($x < $y);
// var_dump($x <= $w);
// var_dump($y == $z);
// var_dump($y === $z);
// var_dump($y !== $z);
// var_dump($y != $z);

// Traccia 5
// Create un array associativo $corsoHackademy con chiavi: “docenti”, “studenti”, “argomenti”
// e come valore associato rispettivamente array contenenti i docenti, alcuni nomi di vostri colleghi, argomenti trattati durante il corso.
// Utilizzate questo array per stampare una frase di presentazione del tipo:
// "Sono paolo e sto studiando bootstrap con giuseppe"
$corsoHackademy = [
    'docenti' => [
        'Emanuele',
        'Paolo',
        'Leonardo',
        'Carlo',
        'Mattia',
        'Davide'
    ],
    'studenti' => [
        'Federico',
        'Alessandro',
        'Marcello',
        'Romina',
        'Karl',
        'Tania'
    ],
    'argomenti' => [
        'Tag semantici',
        'Bootstrap',
        'Form',
        'Manipolazione del DOM',
        'Metodi degli array',
        'Box model'
    ]
];
// echo 'Ciao, sono ' . $corsoHackademy['studenti'][0] . ' ' . 'e sto studiando ' . $corsoHackademy['argomenti'][3] . ' ' . 'con ' . $corsoHackademy['docenti'][2] . '.';