<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\jobseekersProfile;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class JobseekerSeeder extends Seeder
{
    public function run(): void
    {
        jobseekersProfile::create([
            'profile_image'=>'#',
            'age'=>'20',
            'gender'=>'male',
            'language'=>'BM',
        ]);
    }
}
