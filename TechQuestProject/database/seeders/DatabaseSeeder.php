<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create one account each with an admin, seller & user role
        $this->call(UsersTableSeeder::class);
        $this->call(SellersTableSeeder::class);
        $this->call(StaffsTableSeeder::class);
        $this->call(AttendanceTableSeeder::class);

    }
}
