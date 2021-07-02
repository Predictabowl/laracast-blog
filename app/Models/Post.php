<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/**
 * Description of Post
 *
 * @author piero
 */
class Post {

    private $title;
    private $excerpt;
    private $date;
    private $body;
    private $slug;

    public function __construct($title, $excerpt, $date, $body, $slug) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public function getSlug(): string {
        return $this->slug;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getExcerpt() {
        return $this->excerpt;
    }

    public function getDate() {
        return $this->date;
    }

    public function getBody() {
        return $this->body;
    }

    private static function findPost($slug){
        return static::all()-> first(fn ($post) => $post->getSlug() === $slug);
    }

    public static function find($slug) {
        return static::findPost($slug);
    }

    public static function findOrFail($slug) {
        $post = static::findPost($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }

    public static function all() {
        // this should be cached
        return cache()->rememberForever("posts.all", function (){
            return collect(File::files(resource_path("posts")))
                    ->map(fn($file) => YamlFrontMatter::parseFile($file))
                    ->map(fn($document) => new Post(
                            $document->title,
                            $document->excerpt,
                            $document->date,
                            $document->body(),
                            $document->slug))
                    ->sortByDesc(fn($post) => $post->getDate());
        });
    }

}
