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
                ['name'=>'admin', 'username'=> 'admin', 'password'=>bcrypt('asdqwe123'),'category_id'=>6],           
            );
        DB::table('users')->insert($dataUsers);
    }
}
