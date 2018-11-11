<?php

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
          [
            'name'=>'01.jpg',
            'folder' => 'carousel'
          ],[
            'name'=>'02.jpg',
            'folder' => 'carousel'
          ],[
            'name'=>'video.jpg',
            'folder' => 'youtube'
          ],[
            'name'=>'logo',
            'folder' => 'logo'
          ],[
            'name'=>'device.png',
            'folder' => 'services'
          ],[
            'name'=>'card-1.jpg',
            'folder' => 'projects'
          ],[
            'name'=>'card-2.jpg',
            'folder' => 'projects'
          ],[
            'name'=>'card-3.jpg',
            'folder' => 'projects'
          ],[
            'name'=>'1.jpg',
            'folder' => 'instagram'
          ],[
            'name'=>'2.jpg',
            'folder' => 'instagram'
          ],[
            'name'=>'3.jpg',
            'folder' => 'instagram'
          ],[
            'name'=>'4.jpg',
            'folder' => 'instagram'
          ],[
            'name'=>'5.jpg',
            'folder' => 'instagram'
          ],[
            'name'=>'6.jpg',
            'folder' => 'instagram'
          ],[
            'name'=>'add.jpg',
            'folder' => 'ad'
          ],

        ]);
    }
}
