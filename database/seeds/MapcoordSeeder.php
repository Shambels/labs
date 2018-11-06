<?php

use Illuminate\Database\Seeder;

class MapcoordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('mapcoords')->insert([
        'fulladdress' => '35 Av. des Champs-Elysées, 75008 Paris, France',
        'apikey' => 'AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo',
        'lat' => '4.3390363157460925',
        'long' => '50.855362979533275'
      ]);
    }
}
