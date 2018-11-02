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
            'image' => 'img/originals/ceo.jpg',
            'title' => 'Labs Administrator',
            // 'bio' => 'German-born physicist who developed the special and general theories of relativity and won the Nobel Prize for Physics in 1921 for his explanation of the photoelectric effect.'
          ],[
            'name' => 'Editor',
            'email' => 'editor@test.com',
            'password' => bcrypt('123456'),
            'roles_id' => '2',
            'image' => 'img/team/1.jpg',
            'title' => 'Labs Editor',
            // 'bio' => 'Hallyday was born Jean-Philippe Smet on June 15, 1943, in the Malesherbes area of Paris. His Belgian parents split up just months after he was born, and he went to live with an aunt, former silent film actress Hélène Mar. ... He also appeared in his first film, Les Diaboliques, in 1954.',
            
          ],[
            'name' => 'Reader',
            'email' => 'reader@test.com',
            'password' => bcrypt('123456'),
            'roles_id' => '3',
            'image' => 'img/team/2.jpg',
            'title' => 'Labs Reader',
            
          
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
            $tagsCount = App\Tag::all()->count();
            for( $i = 0 ; $i < rand(1,3); $i++) {

              $article->tags()->attach(rand(1,$tagsCount));

            }
            
        });
    }
}
