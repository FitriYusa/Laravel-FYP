<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\jobList;
use Faker\Factory as Faker;

class JobListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_US');

        // Generate fake job lists
        for ($i = 0; $i < 10; $i++) {
            JobList::create([
                'company_id' => $faker->numberBetween(1, 2), // Assuming there are 10 companies in the database
                'title' => $faker->jobTitle,
                'description' => $faker->paragraph,
                'location' => $faker->city,
                'type' => $faker->randomElement(['Full-Time', 'Part-Time', 'Contract', 'Internship']),
                'salary' => $faker->randomNumber(5), // Generates a random salary with up to 5 digits
                'start_date' => $faker->date,
                'end_date' => $faker->date, 
                'start_time' => $faker->time,
                'end_time' => $faker->time, 
                'is_active' => $faker->boolean
            ]);
        }
    }
}
