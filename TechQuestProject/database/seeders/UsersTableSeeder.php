<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                 DB::table('users')->delete();
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
        DB::table('users')->delete(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
            'fname' => 'TechQuest',
            'lname' => 'Academy',
            'username' => "tqadmin",
            'email' => 'tqacademy@admin.com',
            'phone' => '1234567890',
            'position' => 'Manager',
            'office' => 'Ajah',
            'age' => 45,
            'salary' => 60000.00,
            'role' => 'admin',
            'password' => Hash::make('admin'),
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now(), 

        ]);

        DB::table('users')->insert([
            'fname' => 'TechQuest',
            'lname' => 'Staff',
            'username' => "tqstaff",
            'email' => 'tqacademy@staff.com',
            'phone' => '1234567890',
            'position' => 'Tutor',
            'office' => 'Lekki',
            'age' => 36,
            'salary' => 40000.00,
            'role' => 'user',
            'password' => Hash::make('staff'),
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now(), 
        ]);

        DB::table('users')->insert([
            'fname' => 'Nurudeen',
            'lname' => 'Abdulsalaam',
            'username' => "ndsalaam",
            'email' => 'olaitansalaam@outlook.com',
            'phone' => '08168874902',
            'position' => 'Student',
            'office' => 'Ikorudu',
            'age' => 56,
            'salary' => 40000.00,
            'role' => 'user',
            'password' => Hash::make('student'),
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now(), 
        ]);
      }
    }

