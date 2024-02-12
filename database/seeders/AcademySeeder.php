<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Academy;
use Faker\Factory as Faker;

class AcademySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_US');

        // Generate fake data and insert into the 'academies' table
        for ($i = 0; $i < 10; $i++) {
            Academy::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'location' => $faker->city,
                'type' => $faker->randomElement(['Seminar', 'Webinar']),
                'start_date' => $faker->date(),
                'end_date' => $faker->date(),
                'start_time' => $faker->time(),
                'end_time' => $faker->time(),
                'is_active' => $faker->boolean,
            ]);
        }
    }
}
