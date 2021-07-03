<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; //this means that the model have access to the factory method. It's a Facade?

    protected $fillable = ["title","excerpt","body","slug","category_id","user_id"];
//    protected $guarded = ["id"];
//    protected $guarded = []; // This means that no field is guarded, so every field can be mass filled
    
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
