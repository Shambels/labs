<?php

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
        $this->call(MapcoordSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(NewsmailSeeder::class);
        $this->call(TextSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(ProjectSeeder::class);

        $this->call(IconSeeder::class);
        $this->call(ServiceSeeder::class);
    }
}
