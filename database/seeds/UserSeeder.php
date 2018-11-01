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

            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('123456'),
            'roles_id' => '1',
            'image' => 'ceo.jpg',
            'title' => 'Labs Administrator'
          ],[
            'name' => 'Editor',
            'email' => 'editor@test.com',
            'password' => bcrypt('123456'),
            'roles_id' => '2',
            'image' => 'storage/img/team/1.jpg',
            'title' => 'Labs Editor'
            
          ],[
            'name' => 'Reader',
            'email' => 'reader@test.com',
            'password' => bcrypt('123456'),
            'roles_id' => '3',
            'image' => 'storage/img/team/2.jpg',
            'title' => 'Labs Reader'
          
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
