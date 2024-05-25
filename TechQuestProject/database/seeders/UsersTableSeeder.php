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

     public function run()
     {
         // Check if the staff table is empty
         if (DB::table('users')->count() == 0) {
             $this->seedUser();
         } else {
             // Prompt for confirmation if the table is not empty
             if ($this->command->confirm('The user table is not empty. Do you wish to continue and overwrite the existing data?', false)) {
                 // Truncate the table before seeding
                 DB::table('users')->truncate();
                 $this->seedUser();
             } else {
                 $this->command->info('Seeding was cancelled.');
             }
         }
     }
 
     /**
     * Seed the staff table with sample data.
     *
     * @return void
     */

    public function seedUser(): void
    {
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
          'name' => 'Nuyola Admin',
          'username' => 'nuyolaadmin',
          'role' => 'admin',
          'email' => 'nuyolaadmin@gmail.com',
          'password' => Hash::make('admin'),
        ]);

        DB::table('users')->insert([
          'name' => 'Nuyola Seller',
          'username' => 'nuyolaseller',
          'role' => 'seller',
          'email' => 'nuyolaseller@gmail.com',
          'password' => Hash::make('seller'),
        ]);

        DB::table('users')->insert([
            'name' => 'Nuyola User',
            'username' => 'nuyolauser',
            'role' => 'user',
            'email' => 'nuyolauser@gmail.com',
            'password' => Hash::make('user'),
          ]);
      }
    }

