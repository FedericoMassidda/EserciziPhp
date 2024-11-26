<?php
// Traccia 1
// Utilizza i principi di OOP ed Ereditarieta' per creare una struttura a classi. Istanzia un nuovo oggetto $myLocation, per poi richiamare un metodo 
// chiamato getMyCurrentLocation() che stampi a schermo la seguente frase: “Mi trovo in Europa, Italia, Puglia, Ba, Bari, Strada San Giorgio Martire 2D“ 
// mi creo la cascata di eredità dal continente alla via
class Continent{
    // Attributi
    public $nameContinent;
    // Construct
    public function __construct($continent){
        $this-> nameContinent = $continent;
    }
}
class Country extends Continent{
    // Attributi
    public $nameCountry;
    // Construct
    public function __construct($continent, $country){
        parent:: __construct($continent);
        $this-> nameCountry = $country;
    }
}
class Region extends Country{
    // Attributi
    public $nameRegion;
    // Construct
    public function __construct($continent, $country, $region){
        parent:: __construct($continent, $country);
        $this-> nameRegion = $region;
    }
}
class Province extends Region{
    // Attributi
    public $nameProvince;
    // Construct
    public function __construct($continent, $country, $region, $province){
        parent:: __construct($continent, $country,$region);
        $this->nameProvince = $province;
    }
}
class City extends Province{
    // Attributi
    public $nameCity;
    // Contruct
    public function __construct($continent, $country, $region, $province, $city){
        parent:: __construct($continent, $country, $region, $province);
        $this-> nameCity = $city;
    }
}
class Street extends City{
    // Attributi
    public $nameStreet;
    // Construct
    public function __construct($continent, $country, $region, $province, $city, $street){
        parent:: __construct($continent, $country, $region, $province, $city);
        $this-> nameStreet = $street;
    }
    // Metodi
    public function getMyCurrentLocation(){
        echo "Mi trovo in $this->nameContinent, $this->nameCountry, $this->nameRegion, $this->nameProvince, $this->nameCity, $this->nameStreet.";
    }
}
$myLocation = new Street('Europa', 'Spagna', 'Catalogna', 'Barcellona', 'Barcellona', 'La Rambla');
// $myLocation->getMyCurrentLocation();

// Traccia 2
// Crea una struttura a classi sfruttando l’ereditarieta' e seguendo queste semplici regole:
// -le classi non devono avere attributi;
// - ogni classe avra' un metodo specifico protected per stampare la sua specializzazione;
// - non puoi realizzare metodi definiti public per stampare il risultato;
// - l’unico metodo public ammesso e' il costrutture. Il risultato atteso sara': 
// $magikarp = new Fish() - Nel terminale visaulizzerete: Sono un animale Vertebrato | Sono un animale a Sangue Freddo | Splash!

// CLASSE DEGLI ANIMALI VERTEBRATI \\
class Vertebrates{
    public function __construct()
    {
        $this-> vertebratesAnimal();
    }
    // metodo
    protected function vertebratesAnimal(){
        echo "Sono un animale vertebrato. \n";
    }
}
// CLASSE DEGLI ANIMALI A SANGUE CALDO \\
class WarmBlooded extends Vertebrates{
    public function __construct()
    {
        parent:: __construct();
        $this->warmBloodedAnimal();
    }
    // metodo
    protected function warmBloodedAnimal(){
        echo "Sono un animale a sangue caldo. \n";
    }
}
// CLASSE DEGLI ANIMALI A SANGUE FREDDO \\
class ColdBlooded extends Vertebrates{
    public function __construct()
    {
        parent:: __construct();
        $this-> coldBloodedAnimal();
    }
    // metodo
    protected function coldBloodedAnimal(){
        echo "Sono un animale a sangue freddo. \n";
    }
}
// CLASSE DEGLI ANIMALI MAMMIFERI \\
class Mammals extends WarmBlooded{
    public function __construct()
    {
        parent:: __construct();
        $this-> mammalAnimal();
    }
    // metodo
    protected function mammalAnimal(){
        echo "Allatto mio figlio. \n";
    }
}
// CLASSE DEGLI UCCELLI \\
class Birds extends warmBlooded{
    public function __construct()
    {
        parent:: __construct();
        $this-> birdAnimal();
    }
    protected function birdAnimal(){
        echo "Posso volare. \n";
    }
}
// CLASSE DEI PESCI \\
class Fish extends ColdBlooded{
    public function __construct()
    {
        parent:: __construct();
        $this-> fishAnimal();
    }
    protected function fishAnimal(){
        echo "Posso nuotare. \n";
    }
}
// CLASSE DEI RETTILI \\
class Reptiles extends ColdBlooded{
    public function __construct()
    {
        parent:: __construct();
        $this-> reptileAnimal();
    }
    protected function reptileAnimal(){
        echo "Ho le scaglie. \n";
    }
}
// CLASSE DEGLI ANFIBI \\
class Amphibians extends ColdBlooded{
    public function __construct()
    {
        parent:: __construct();
        $this-> amphibiansAnimal();
    }
    protected function amphibiansAnimal(){
        echo "Posso vivere dentro e fuori dall'acqua. \n";
    }
}

// Traccia 3
// Dato un array di partenza con classe genitore e classe figlio, completa la classe figlio con le strutture mancanti e, utilizzando il livello di severita'
// che ritieni piu' opportuno, estendi i metodi per stampare a terminale la seguente frase: “La mia macchina e' Opel, con targa ND 123 OJ e nmero di Telaio 1234“
class Car { 
    // attributi
    private $num_telaio; 
    private $access = 9999;
    public $accessInput;
    // construct
    public function __construct($numTelaio)
    {
        $this-> num_telaio = $numTelaio;
        $this->accessInput = readline('insersci il codice d\'accesso' . "\n");
        $this->checkPermit();
        $this-> getNumTelaio();
    }
    // metodi
    // livello di sicurezza per accedere al numero del telaio
    public function checkPermit(){
        if($this->access != $this->accessInput){
            die('Codice d\' accesso errato');
        }
    }
    // getter
    public function getNumTelaio(){
        return $this-> num_telaio;
    }
}
class MyCar extends Car { 
    // attributi
    protected $license; 
    protected $name;
    // construct
    public function __construct($license, $name, $numTelaio)
    {
        $this-> license = $license;
        $this-> name= $name;
        parent:: __construct($numTelaio);
        $this-> getLicense();
        $this-> getName();
        $this->printInfo();
    }
    // metodo
    public function printInfo(){
        echo 'La mia macchina è una ' . $this-> name . ' con targa ' . $this-> license . ' e il numero di telaio: ' . parent::getNumTelaio();
    }
    // getter
    public function getLicense(){
        return $this->license;
    }
    public function getName(){
        return $this->name;
    }
} 
$myCar= new MyCar('DA330TT', 'Bravo', '2244');