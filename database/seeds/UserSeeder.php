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
            'roles_id' => '1'
          ],[
            'name' => 'editor',
            'email' => 'editor@test.com',
            'password' => bcrypt('123456'),
            'roles_id' => '2'
          ],[
            'name' => 'reader',
            'email' => 'reader@test.com',
            'password' => bcrypt('123456'),
            'roles_id' => '3'
          ]
        ]);

    }
}
