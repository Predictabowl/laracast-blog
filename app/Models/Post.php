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

    /*
        Why filter query logic should be inside the model class? It makes no sense.
        Where are the repositories?
    */

    // The name must be "scope<methodName>" so it can be called
    // with Post::newQuery()->methodName()
    public function scopeFilter($query, array $filters)
    {
        if (isset($filters["search"])) {
            //This is a standard SQL query, equivalent to
            //|select * from posts
            //|where title like "%request("search")%";
            //remember the % are wildcards
            //we use a function to group these 2 queries in a isngle statement,
            //otherwise the last part will chain with next queries
            $query ->where(fn ($query) => $query
                    ->where("title", "like", "%".request("search")."%")
                    ->orWhere("body", "like", "%".request("search")."%"));
        }
        // there's no need to return, because it buold over the query
        // I guess is all inside the Laravel framework, but it's a very confusing choice

        if (isset($filters["category"])) {
            $query->whereHas(
                "category",
                fn ($query) => $query->where("slug", request("category"))
            );
        }

        if (isset($filters["author"])) {
            $query->whereHas(
                "author",
                fn ($query) => $query->where("username", request("author"))
            );
        }
    }
}
