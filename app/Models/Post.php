<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

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

    public function getSlug() {
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

    public static function find($slug) {
        $path = resource_path("posts/{$slug}.html");
        if (!file_exists($path)) {
            throw new ModelNotFoundException();
        }
        return cache()->remember("posts.$slug", now()->addSeconds(2), fn() => file_get_contents($path));
    }

    public static function all() {
        $files = File::files(resource_path("posts/"));
        return array_map(fn($file) => $file->getContents(), $files);
    }

}
