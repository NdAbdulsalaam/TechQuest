<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
          'fname' => 'Admin',
          'lname' => 'Seeder',
          'username' => 'admin',
          'email' => 'admin@gmail.com',
          'role' => 'admin',
          'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
          'fname' => 'Seller',
          'lname' => 'Seeder',
          'username' => 'seller',
          'email' => 'seller@gmail.com',
          'role' => 'seller',
          'password' => Hash::make('password'),
        ]);
      }
}
