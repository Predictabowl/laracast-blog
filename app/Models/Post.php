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

    /* The following is for eager loading,
       if it's set like that it will ALWAYS eager load.
       If you only need eager load in specific situation is better to use
       'load' and 'with' when doing queries.
       None the less it can be disabled using 'without(["author","category"])' in the query.
       The better solution is to create a repository for working with entities.
    */
//    protected $with = ["author","category"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
