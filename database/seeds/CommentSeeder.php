<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = App\Article::all();
        $articles->each(function($article){
          $article->comments()->save(factory(App\Comment::class)->make());
        });
    }
}
