<?php

use Illuminate\Database\Seeder;
use Carrito\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingreso = array(
			[
				'name' 		=> 'Augusto',  
				'email' 	=> 'ayalaaugusto@outlook.com', 
				'user' 		=> 'augusto',
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'admin',
				'active' 	=> 1,
				'address' 	=> 'Argentina',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			[
				'name' 		=> 'Graciela', 
				'email' 	=> 'graciela@correo.com', 
				'user' 		=> 'graciela',
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'user',
				'active' 	=> 1,
				'address' 	=> 'Argentina',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],

		);

		User::insert($ingreso);
    }
}
