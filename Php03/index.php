<?php
// 1. Crea una classe Company che abbia i seguenti attributi pubblici:
//  a. name: nome dell’azienda; 
//  b. location: stato in cui e' ubicata la sede dell’azienda; 
//  c. tot_employees: numero di dipedenti assunti in quella sede (di default, 0);

// 2. Crea 5 istanze di 5 aziende diverse 

// 3. Crea un metodo che permetta di stampare a terminale la seguente frase: “L’ufficio Aulab con sede in Italia ha ben 50 dipendenti“; 
//  se la sede non ha dipendenti, allora stampa: “L’ufficio Aulab con sede in Italia non ha dipendenti“;

// 4. Aggiungi un nuovo attributo chiamato $avg_salary nella Classe Company. Aggiorna poi le aziende che hai gia' creato nel punto 2.

// 5. Implementa un metodo che calcoli la spesa per un numero variabile di mesi (praticamente il metodo deve accettare come parametro N mesi) 
//  e poi uno che stampi a schermo l’informazione (sono due metodi diversi);  

// 6. Implementa un attributo statico che tenga traccia di quante aziende sono state create;

// Extra: 
// 1. Implementa un attributo statico che, in un array, salvi il costo medio annuale relativo ai dipendenti di ogni azienda;
// 2. Implementa un metodo statico che stampi la seguente frase a schermo: “Considerando tutte le aziende nel nostro Gruppo, spendiamo in media un totale di 40000 all’anno”. 

class Company{
    // PROPRIETA' \\
    public $name;
    public $location;
    public $tot_employees;
    public $avg_salary;
    // PROPRIETA' STATICHE \\
    public static $num_companies = 0;
    public static $average_cost = [];
    // CONSTRUCTOR \\
    public function __construct($name, $location, $employees, $avg_salary){ //ho creato la function constructor per potermi generare le mie istanze tramite i parametri formali
        $this-> name = $name;
        $this-> location = $location;
        $this-> tot_employees = $employees;
        $this-> avg_salary = $avg_salary;
        self::$num_companies ++;
        self::push_average_cost($avg_salary, $employees);
    }
    // METODI \\
    // metodo che mostra a terminale il numero dei dipendenti
    public function presentation(){
        if($this->tot_employees > 0){
            echo "L'azienda $this->name con sede in $this->location ha ben $this->tot_employees dipendenti. \n";
        }else{
            echo "L'azienda $this->name con sede in $this->location non ha dipendenti. \n";
        }
    }
    // metodo che calcola la spesa per un numero variabile di mesi
    public function company_exits($months){
        return $months * ($this->avg_salary * $this->tot_employees);
    }
    // metodo che stampa a terminale la spesa della funzione precedente
    public function print_extis($months){
        echo "L'azienda $this->name ha speso un totale di {$this->company_exits($months)}$ in $months mesi.";
    }
    // METODI STATICI \\
    // metodo statico che stampa a terminale quante aziende sono state create
    public static function print_num_companies(){
        echo 'Ad ora esistono ' . self::$num_companies . ' ' . 'aziende.';
    }
    // metodo statico che mi pusha nell'array il costo medio annuale per la singola azienda
    public static function push_average_cost($avg_salary, $employees){
        self::$average_cost[] = $avg_salary * $employees * 12;
    }
    // metodo che stampa a schermo il costo medio annuale per la singola azienda
    public static function print_average_cost(){
        echo 'Considerando tutte le aziende nel nostro Gruppo, spendiamo in media un totale di ' . array_sum(Company::$average_cost)/Company::$num_companies . "$ all'anno.";
    }
}

// creo le 5 istanze
$amazon = new Company('Amazon', 'America', 1522, 1460);
$google= new Company('Google', 'America', 522, 1680);
$aulab= new Company('Aulab', 'Italia', 52, 1500);
$casio= new Company('Casio', 'Giappone', 256, 1200);
$blockbuster= new Company('Blockbuster', 'America', 0, 20);

// invoco i metodi per il punto 3
// $aulab->presentation();

// aggiorno l'attributo appena creato per ognuna delle 5 aziende. (implementato direttamente nel constructor)
// $amazon-> avg_salary = 1460;
// $google-> avg_salary = 1680;
// $aulab-> avg_salary = 1500;
// $casio-> avg_salary = 1200;
// $blockbuster-> avg_salary = 20;

// richiamo il metodo per stamparmi a terminale la spesa della relativa azienda per N mesi
// $blockbuster-> print_extis(3);

// richiamo il metodo statico per stampare a terminale quante aziende sono state create
// Company::print_num_companies();

Company::print_average_cost();
