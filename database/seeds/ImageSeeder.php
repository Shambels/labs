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
            'name'=>'big-logo.png',
            'folder' => 'brands'
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
            'name'=>'img/instagram/1.jpg',
            'folder' => 'instagram'
          ],[
            'name'=>'img/instagram/2.jpg',
            'folder' => 'instagram'
          ],[
            'name'=>'img/instagram/3.jpg',
            'folder' => 'instagram'
          ],[
            'name'=>'img/instagram/4.jpg',
            'folder' => 'instagram'
          ],[
            'name'=>'img/instagram/5.jpg',
            'folder' => 'instagram'
          ],[
            'name'=>'img/instagram/6.jpg',
            'folder' => 'instagram'
          ],[
            'name'=>'img/add.jpg',
            'folder' => 'ad'
          ],

        ]);
    }
}
