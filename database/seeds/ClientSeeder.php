<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Client::class, 9)->create()
      ->each(function($client){
          for($i = 0; $i < rand(1,3); $i++){

            $client->testimonials()->save(factory(App\Testimonial::class)->make());
          }
      });
    }
}
