<?php

use Illuminate\Database\Seeder;

class UsersAdminGenerate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $alearorio = str_random(8);

         DB::table('users')->insert([
    			'email' 	         => $alearorio.'@gmail.com',
    			'username'         => 'sysadmin',
    			'name'  	         => 'admin',
    			'is_admin'         => true,
     			'password'	       => bcrypt('admin'),
          'fecha_nacimiento' => $alearorio
        ]);
    }
}
