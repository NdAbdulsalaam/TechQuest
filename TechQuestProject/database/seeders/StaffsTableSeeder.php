<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run()
     {
         // Check if the staff table is empty
         if (DB::table('staffs')->count() == 0) {
             $this->seedStaff();
         } else {
             // Prompt for confirmation if the table is not empty
             if ($this->command->confirm('The staff table is not empty. Do you wish to continue and overwrite the existing data?', false)) {
                 // Truncate the table before seeding
                 DB::table('staffs')->truncate();
                 $this->seedStaff();
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

    public function seedStaff(): void
    {
        
        DB::table('staffs')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('staffs')->insert([
            'fname' => 'Nurudeen',
            'lname' => 'Abdulsalaam',
            'email' => 'john.doe@example.com',
            'phone' => '1234567890',
            'position' => 'Manager',
            'role' => 'user',
            'office' => 'ajah',
            'age' => 45,
            'salary' => 60000.00,
            'password' => Hash::make('staff'),
        ]);

        DB::table('staffs')->insert([
            'fname' => 'Daniel',
            'lname' => 'Martins',
            'email' => 'jane.smith@example.com',
            'phone' => '0987654321',
            'position' => 'Sales Associate',
            'role' => 'user',
            'office' => 'ikorodu',
            'age' => 45,
            'salary' => 40000.00,
            'password' => Hash::make('staff'),
        ]);
    }
}
