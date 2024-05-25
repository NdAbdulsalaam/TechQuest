<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Attendance;
use App\Models\Staff;
use Carbon\Carbon;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function run()
     {
         // Check if the staff table is empty
         if (DB::table('attendances')->count() == 0) {
             $this->seedAttendance();
         } else {
             // Prompt for confirmation if the table is not empty
             if ($this->command->confirm('The attendance table is not empty. Do you wish to continue and overwrite the existing data?', false)) {
                 // Truncate the table before seeding
                 DB::table('attendances')->truncate();
                 $this->seedAttendance();
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

    public function seedAttendance()
    {
        $staff = Staff::all();

        foreach ($staff as $member) {
            Attendance::create([
                'staff_id' => $member->id,
                'date' => Carbon::now()->format('Y-m-d'),
                'check_in_time' => Carbon::now()->subHours(2)->format('H:i:s'),
                'check_out_time' => Carbon::now()->format('H:i:s'),
            ]);

            // Add more sample data as needed
        }
    }
}

