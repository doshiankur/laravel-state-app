<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
    			'name' => 'ankur doshi',
    			'email' => 'ankur.doshi@nascentinfo.com',
    			'password' => Hash::make('Demo@123')
			]);
    }
}