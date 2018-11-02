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
          for($i=0; $i<rand(0,4); $i++){

            $article->comments()->save(factory(App\Comment::class)->make());
            
          }
        });
    }
}
