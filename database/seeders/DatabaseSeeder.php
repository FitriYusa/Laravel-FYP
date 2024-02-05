<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\jobseekersProfile;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //create admin user
        User::create([
            'name' => 'Admin',
            'email' =>'admin@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'admin',
        ]);

        //create company user
        User::create([
            'name' => 'Company',
            'email' =>'company@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'company',
        ]);

        //create jobseekers user
        User::create([
            'name' => 'Jobseekers',
            'email' =>'jobseekers@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'jobseekers',
        ]);
    }

}
