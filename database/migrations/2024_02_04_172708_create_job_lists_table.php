<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id'); // Foreign key for the company
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->string('type'); //job type
            $table->decimal('salary', 10, 2)->nullable();
            $table->date('start_date'); 
            $table->date('end_date'); 
            $table->time('start_time'); 
            $table->time('end_time'); 
            $table->boolean('is_active')->default(true); // Indicates whether the job is currently active
            $table->timestamps();
        });

        // // Add a check constraint to ensure end_date is not before start_date
        //  DB::statement("ALTER TABLE academies ADD CONSTRAINT end_date_after_start_date CHECK (end_date >= start_date)");

        // // Add a check constraint to ensure end_time is not before start_time when dates are equal
        //  DB::statement("ALTER TABLE academies ADD CONSTRAINT end_time_after_start_time CHECK (CASE WHEN end_date = start_date THEN end_time >= start_time ELSE true END)");

    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_lists');
    }
};

// };    public function up(): void
//     {
//         Schema::create('job_lists', function (Blueprint $table) {
//             $table->id();
//             $table->foreignId('company_id'); // Foreign key for the company
//             $table->string('title');
//             $table->text('description');
//             $table->string('location');
//             $table->string('type'); //job type
//             $table->decimal('salary', 10, 2)->nullable();
//             $table->date('start_date'); 
//             $table->date('end_date'); 
//             $table->time('start_time'); 
//             $table->time('end_time'); 
//             $table->boolean('is_active')->default(true); // Indicates whether the job is currently active
//             $table->timestamps();
//         });
//     }