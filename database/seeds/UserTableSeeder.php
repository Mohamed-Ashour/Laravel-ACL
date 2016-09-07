<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
        		'name' => 'ahmed',
        		'email' => 'ahmed@gmail.com',
        		'password' => bcrypt('123456')
        	],
            [
        		'name' => 'mohamed',
        		'email' => 'mohamed@gmail.com',
        		'password' => bcrypt('123456')
        	],
            [
        		'name' => 'ali',
        		'email' => 'ali@gmail.com',
        		'password' => bcrypt('123456')
        	],
        ];

        foreach ($users as $key => $value) {
        	User::create($value);
        }
    }
}
