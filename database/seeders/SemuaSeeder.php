<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\jobseekersProfile;
use App\Models\jobList;
use App\Models\Academy;
use Faker\Factory as Faker;

class SemuaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' =>'admin@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'admin',
        ]);

        User::create([
            'name' => 'Apple',
            'email' =>'apple@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'company',
        ]);

        User::create([
            'name' => 'Samsung',
            'email' =>'samsung@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'company',
        ]);

        User::create([
            'name' => 'Multimedia University',
            'email' =>'mmu@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'company',
        ]);

        User::create([
            'name' => 'Google',
            'email' =>'google@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'company',
        ]);

        User::create([
            'name' => 'Marry Brown',
            'email' =>'mb@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'company',
        ]);

        User::create([
            'name' => 'John Lee',
            'email' =>'john@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'jobseekers',
        ]);

        User::create([
            'name' => 'Ahmad Bob',
            'email' =>'ahmad@example.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'jobseekers',
        ]);

        $faker = Faker::create();

        // // Generate fake job lists
        // for ($i = 0; $i < 10; $i++) {
        //     JobList::create([
        //         'company_id' => $faker->numberBetween(2, 6), // Assuming there are 10 companies in the database
        //         'title' => $faker->jobTitle,
        //         'description' => $faker->realText(), // Generate a random English paragraph
        //         'location' => $faker->city,
        //         'type' => $faker->randomElement(['Full-Time', 'Part-Time', 'Contract', 'Internship']),
        //         'salary' => $faker->randomNumber(5), // Generates a random salary with up to 5 digits
        //         'start_date' => $faker->date,
        //         'end_date' => $faker->date, 
        //         'start_time' => $faker->time,
        //         'end_time' => $faker->time, 
        //         'is_active' => $faker->boolean
        //     ]);
        // }

        JobList::create([
            'company_id' => $faker->numberBetween(2, 6),
            'title' => 'Senior Software Engineer',
            'description' => 'Develop and maintain high-quality software solutions for our clients. Collaborate with cross-functional teams to deliver projects on time.',
            'location' => 'Kuala Lumpur, Malaysia',
            'type' => 'Full-Time',
            'salary' => '10000',
            'start_date' => '2024-02-20',
            'end_date' => '2024-02-22',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'is_active' => true
        ]);
        
        JobList::create([
            'company_id' => $faker->numberBetween(2, 6),
            'title' => 'Marketing Intern',
            'description' => 'Assist in creating marketing campaigns, managing social media accounts, and analyzing marketing data. Gain hands-on experience in a fast-paced environment.',
            'location' => 'Petaling Jaya, Malaysia',
            'type' => 'Internship',
            'salary' => '10000',
            'start_date' => '2024-02-20',
            'end_date' => '2024-02-22',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'is_active' => true
        ]);
        
        JobList::create([
            'company_id' => $faker->numberBetween(2, 6),
            'title' => 'Customer Service Representative',
            'description' => 'Provide exceptional customer support via phone, email, and live chat. Resolve customer inquiries and issues efficiently.',
            'location' => 'Penang, Malaysia',
            'type' => 'Part-Time',
            'salary' => '10000',
            'start_date' => '2024-02-20',
            'end_date' => '2024-02-22',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'is_active' => true
        ]);
        
        JobList::create([
            'company_id' => $faker->numberBetween(2, 6),
            'title' => 'Graphic Designer',
            'description' => 'Design marketing materials, including banners, flyers, and social media graphics. Collaborate with the marketing team to ensure brand consistency.',
            'location' => 'Johor Bahru, Malaysia',
            'type' => 'Full-Time',
            'salary' => '10000',
            'start_date' => '2024-02-20',
            'end_date' => '2024-02-22',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'is_active' => true
        ]);
        
        JobList::create([
            'company_id' => $faker->numberBetween(2, 6),
            'title' => 'Sales Representative',
            'description' => 'Identify and reach out to potential clients, conduct product demonstrations, and negotiate contracts. Meet and exceed sales targets.',
            'location' => 'Kuching, Malaysia',
            'type' => 'Full-Time',
            'salary' => '10000',
            'start_date' => '2024-02-20',
            'end_date' => '2024-02-22',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'is_active' => true
        ]);
        
        JobList::create([
            'company_id' => $faker->numberBetween(2, 6),
            'title' => 'Data Analyst',
            'description' => 'Analyze data to identify trends, patterns, and insights. Prepare reports and presentations to communicate findings to stakeholders.',
            'location' => 'Kota Kinabalu, Malaysia',
            'type' => 'Contract',
            'salary' => '10000',
            'start_date' => '2024-02-20',
            'end_date' => '2024-02-22',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'is_active' => true
        ]);
        
        JobList::create([
            'company_id' => $faker->numberBetween(2, 6),
            'title' => 'Human Resources Assistant',
            'description' => 'Assist with recruitment, onboarding, and employee relations activities. Maintain accurate employee records and assist with HR projects as needed.',
            'location' => 'Melaka, Malaysia',
            'type' => 'Part-Time',
            'salary' => '10000',
            'start_date' => '2024-02-20',
            'end_date' => '2024-02-22',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'is_active' => true
        ]);
        
        JobList::create([
            'company_id' => $faker->numberBetween(2, 6),
            'title' => 'Content Writer',
            'description' => 'Create engaging and informative content for blogs, websites, and social media channels. Research industry trends and keywords to optimize content.',
            'location' => 'Ipoh, Malaysia',
            'type' => 'Full-Time',
            'salary' => '10000',
            'start_date' => '2024-02-20',
            'end_date' => '2024-02-22',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'is_active' => true
        ]);
        
        JobList::create([
            'company_id' => $faker->numberBetween(2, 6),
            'title' => 'IT Support Specialist',
            'description' => 'Provide technical support to internal users, troubleshoot hardware and software issues, and maintain IT systems and networks.',
            'location' => 'Shah Alam, Malaysia',
            'type' => 'Full-Time',
            'salary' => '10000',
            'start_date' => '2024-02-20',
            'end_date' => '2024-02-22',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'is_active' => true
        ]);
        
        JobList::create([
            'company_id' => $faker->numberBetween(2, 6),
            'title' => 'Project Manager',
            'description' => 'Plan, execute, and manage projects from initiation to completion. Coordinate project resources, track progress, and communicate with stakeholders.',
            'location' => 'Klang, Malaysia',
            'type' => 'Full-Time',
            'salary' => '10000',
            'start_date' => '2024-02-20',
            'end_date' => '2024-02-22',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'is_active' => true
        ]);
        

        Academy::create([
            'title' => 'Digital Marketing Mastery',
            'description' => 'Learn the ins and outs of digital marketing strategies, including SEO, social media marketing, and email campaigns.',
            'location' => 'Online',
            'type' => 'Webinar',
            'start_date' => '2024-02-20',
            'end_date' => '2024-02-22',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'is_active' => $faker->boolean,
        ]);

        // Academy 2
        Academy::create([
            'title' => 'Financial Planning Bootcamp',
            'description' => 'Get a comprehensive understanding of personal finance management, investment strategies, and retirement planning.',
            'location' => 'City Center Conference Hall, New York',
            'type' => 'Seminar',
            'start_date' => '2024-03-05',
            'end_date' => '2024-03-07',
            'start_time' => '09:00:00',
            'end_time' => '16:00:00',
            'is_active' => true
        ]);

        // Academy 3
        Academy::create([
            'title' => 'Graphic Design Workshop',
            'description' => 'Dive into the world of graphic design with hands-on exercises covering design principles, software tools, and portfolio building.',
            'location' => 'Creative Hub, Los Angeles',
            'type' => 'Workshop',
            'start_date' => '2024-04-10',
            'end_date' => '2024-04-12',
            'start_time' => '13:00:00',
            'end_time' => '17:00:00',
            'is_active' => true
        ]);

        // Academy 4
        Academy::create([
            'title' => 'Leadership Excellence Seminar',
            'description' => 'Develop essential leadership skills, including communication, team management, and strategic decision-making.',
            'location' => 'Virtual',
            'type' => 'Seminar',
            'start_date' => '2024-05-15',
            'end_date' => '2024-05-17',
            'start_time' => '11:00:00',
            'end_time' => '13:00:00',
            'is_active' => true
        ]);

        // Academy 5
        Academy::create([
            'title' => 'Culinary Arts Masterclass',
            'description' => 'Explore the art of cooking with professional chefs, covering techniques, flavor combinations, and plating.',
            'location' => 'Culinary Institute, Paris',
            'type' => 'Workshop',
            'start_date' => '2024-06-20',
            'end_date' => '2024-06-22',
            'start_time' => '09:00:00',
            'end_time' => '15:00:00',
            'is_active' => true
        ]);

        // Academy 6
        Academy::create([
            'title' => 'Data Science Summit',
            'description' => 'Delve into the world of data science, machine learning, and artificial intelligence with industry experts.',
            'location' => 'Technology Hub, San Francisco',
            'type' => 'Seminar',
            'start_date' => '2024-07-25',
            'end_date' => '2024-07-27',
            'start_time' => '10:00:00',
            'end_time' => '16:00:00',
            'is_active' => true
        ]);

        // Academy 7
        Academy::create([
            'title' => 'Yoga and Meditation Retreat',
            'description' => 'Rejuvenate your mind and body with daily yoga sessions, meditation practices, and wellness workshops.',
            'location' => 'Tranquil Retreat Center, Bali',
            'type' => 'Workshop',
            'start_date' => '2024-08-05',
            'end_date' => '2024-08-10',
            'start_time' => '08:00:00',
            'end_time' => '12:00:00',
            'is_active' => true
        ]);

        // Academy 8
        Academy::create([
            'title' => 'Web Development Bootcamp',
            'description' => 'Learn the fundamentals of web development, including HTML, CSS, JavaScript, and responsive design principles.',
            'location' => 'Coding Academy, London',
            'type' => 'Workshop',
            'start_date' => '2024-09-15',
            'end_date' => '2024-09-17',
            'start_time' => '10:00:00',
            'end_time' => '16:00:00',
            'is_active' => true
        ]);

        // Academy 9
        Academy::create([
            'title' => 'Creative Writing Intensive',
            'description' => 'Unlock your creativity with writing exercises, feedback sessions, and discussions on storytelling techniques.',
            'location' => 'Writers\' Studio, New York',
            'type' => 'Workshop',
            'start_date' => '2024-10-10',
            'end_date' => '2024-10-12',
            'start_time' => '11:00:00',
            'end_time' => '15:00:00',
            'is_active' => true
        ]);

        // Academy 10
        Academy::create([
            'title' => 'Entrepreneurship Summit',
            'description' => 'Gain insights into entrepreneurship, startup strategies, and business development from successful entrepreneurs.',
            'location' => 'Innovation Center, Silicon Valley',
            'type' => 'Seminar',
            'start_date' => '2024-11-20',
            'end_date' => '2024-11-22',
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'is_active' => true
        ]);


    }
}
