<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ArticleEditForm extends Component
{
    public $article;
    #[Validate()]
    public $title;
    #[Validate()]
    public $price;
    #[Validate()]
    public $description;
    #[Validate()]
    public $category_id;

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

    public function update(){
        $this->article->title = $this->title;
        $this->article->price = $this->price;
        $this->article->description = $this->description;
        $this->article->category_id = $this->category_id;
        $this->article->is_accepted = null;
        $this->article->save();

        if($this->article->user->is_revisor){
            $this->article->is_accepted = true;
            $this->article->save();
        }
        session()->flash('success', 'Articolo modificato con successo!');
    }
    public function mount(){
        $this->title = $this->article->title;
        $this->price = $this->article->price;
        $this->description = $this->article->description;
        $this->category_id = $this->article->category_id;
    }
    public function render()
    {
        return view('livewire.article-edit-form');
    }
}
