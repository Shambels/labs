<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
          [
            'name'=>' categorie 1',
            'valid' => true
          ],[
            'name'=>' categorie 2',
            'valid' => true
          ],[
            'name'=>' categorie 3',
            'valid' => true
          ],[
            'name'=>' categorie 4',
            'valid' => true
          ],[
            'name'=>' categorie 5',
            'valid' => true
          ],[
            'name'=>' categorie 6',
            'valid' => true
          ]
        ]);
    }
}
