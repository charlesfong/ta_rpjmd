<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataUsers = array (
            ['username'=> 'admin', 'password'=>bcrypt('123'),'category'=>'admin'],
            
            
            );
        DB::table('users')->insert($dataUsers);
    }
}
