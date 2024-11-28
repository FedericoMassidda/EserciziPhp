<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\ResizeImage;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use App\Jobs\RemoveFaces;

class CreateArticle extends Component
{
    use WithFileUploads;

    public $article;
    #[Validate()]
    public $title;
    #[Validate()]
    public $price;
    #[Validate()]
    public $description;
    #[Validate()]
    public $category_id;
    public $images = [];
    public $temporary_images;


    // validation
    public function rules()
    {
        return [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required|min:10|max:1000',
            'category_id' => 'required',
        ];
    }
    // messages
    protected $messages = [
        'title.required' => 'Il titolo è obbligatorio.',
        'price.required' => 'Il prezzo è obbligatorio.',
        'description.required' => 'La descrizione è obbligatoria.',
        'description.min' => 'La descrizione deve avere almeno 10 caratteri.',
        'description.max' => 'La descrizione deve avere massimo 1000 caratteri.',
        'category_id.required' => 'La categoria è obbligatoria.'
    ];
    // temporary images
    public function updatedTemporaryImages()
    { //updated + nome attributo è un hook di livewire (serve per monitorare ed aggiornare in tempo reale i cambiamenti della proprietà)
        if ($this->validate(
            [
                'temporary_images.*' => 'image|max:2048', //regola per ogni immagine
                'temporary_images' => 'max:6'
            ] //regola per l'array
        )) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }
    // remove single image in loading phase
    public function removeImage($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
    // clean form function
    protected function cleanForm()
    {
        $this->title = '';
        $this->price = '';
        $this->description = '';
        $this->category_id = '';
        $this->images = [];
    }
    // store articles
    public function store()
    {
        $this->validate();

        $article = Article::create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'user_id' => Auth::user()->id
        ]);

        if($article->user->is_revisor){
            $article->is_accepted = true;
            $article->save();
        }

        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName = "articles/{$article->id}";
                $newImage = $article->images()->create(['path' => $image->store($newFileName, 'public')]);
                //dispatch(new ResizeImage($newImage->path, 300, 300));

                // Esegue una serie di job in sequenza usando withChain()
                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 300, 300),  // Ridimensiona l'immagine
                    new GoogleVisionSafeSearch($newImage->id),   // Analizza l'immagine per contenuti inappropriati
                    new GoogleVisionLabelImage($newImage->id)    // Applica etichette all'immagine
                ])->dispatch($newImage->id); // Dispatch per avviare la catena di job
            }

            // Elimina la cartella temporanea livewire dopo aver processato le immagini
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        session()->flash('success', 'Articolo creato con successo!');
        $this->cleanForm();
    }

        
    

    public function render()
    {
        return view('livewire.create-article');
    }
}
