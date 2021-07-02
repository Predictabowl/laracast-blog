<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            "name" => "Personal",
            "slug" => "personal"
        ]);

        $family = Category::create([
            "name" => "Family",
            "slug" => "family"
        ]);

        $work = Category::create([
            "name" => "Work",
            "slug" => "work"
        ]);

        Post::create([
            "user_id" => $user->id,
            "category_id" => $family->id,
            "title" => "My Family Post",
            "slug" => "my-family-post",
            "excerpt" => "This is a family excerpt",
            "body" => "<p>I promessi sposi è un celebre romanzo storico di Alessandro Manzoni, ritenuto il più famoso e il più letto tra quelli scritti in lingua italiana</p>"
        ]);

        Post::create([
            "user_id" => $user->id,
            "category_id" => $work->id,
            "slug" => "my-work-post",
            "title" => "My Work Post",
            "excerpt" => "This is a work excerpt",
            "body" => "<p>I promessi sposi è un celebre romanzo storico di Alessandro Manzoni, ritenuto il più famoso e il più letto tra quelli scritti in lingua italiana</p>"
        ]);

        Post::create([
            "user_id" => $user->id,
            "category_id" => $personal->id,
            "slug" => "my-personal-post",
            "title" => "My Personal  Post",
            "excerpt" => "This is a personal excerpt",
            "body" => "<p>I promessi sposi è un celebre romanzo storico di Alessandro Manzoni, ritenuto il più famoso e il più letto tra quelli scritti in lingua italiana</p>"
        ]);
    }
}
