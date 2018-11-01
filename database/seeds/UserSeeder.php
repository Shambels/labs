<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          [

            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('123456'),
            'roles_id' => '1',
            'image' => 'ceo.jpg'
          ],[
            'name' => 'editor',
            'email' => 'editor@test.com',
            'password' => bcrypt('123456'),
            'roles_id' => '2',
            
          ],[
            'name' => 'reader',
            'email' => 'reader@test.com',
            'password' => bcrypt('123456'),
            'roles_id' => '3',
          
          ]
        ]);
        factory(App\User::class, 5)->create()
        ->each(function($user){
            for($i = 0; $i < rand(2,4); $i++){

              $user->articles()->save(factory(App\Article::class)->make());
            }
        });;
        $articles = App\Article::all();
        $articles->each(function($article){
            $tagsNum = App\Tag::all()->count();
            $article->tags()->attach(rand(1,$tagsNum/2));
            $article->tags()->attach(rand(($tagsNum/2)+1,$tagsNum));
        });
    }
}
