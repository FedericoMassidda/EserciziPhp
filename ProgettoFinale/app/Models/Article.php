<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable;
    use HasFactory;
    protected $fillable = ['title', 'price', 'description', 'category_id', 'user_id', 'youtube_limk'];

    // relationships
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function images(){
        return $this->hasMany(Image::class);
    }

    public function toSearchableArray() 
    { 
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category
        ];
    }

    public function setAccepted($value = null){
        $this->is_accepted = $value;
        $this->save();
    }
}    
