<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PrayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use Carbon to create a specific date for the db
        $date = Carbon::create(2022, 7, 20, 0, 33, 30);

    // Sample data for prayers table with the specific date
    $prayers = [
        [
            'user_id' => 1, // Replace with the desired user_id
            'content' => 'Seeded prayer content 1',
            'is_answered' => false,
            'created_at' => $date,
            'updated_at' => $date,
        ],
        [
            'user_id' => 1, // Replace with the desired user_id
            'content' => 'Seeded prayer content 2',
            'is_answered' => false,
            'created_at' => $date,
            'updated_at' => $date,
        ],
        // Add more sample data as needed...
    ];

        // Insert the data into the prayers table
        DB::table('prayers')->insert($prayers);

    }
}
