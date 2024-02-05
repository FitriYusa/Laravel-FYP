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
            $table->unsignedBigInteger('company_id'); // Foreign key for the company
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->string('type'); //job type
            $table->decimal('salary', 10, 2)->nullable();
            $table->date('start_date'); 
            $table->date('end_date')->nullable(); 
            $table->boolean('is_active')->default(true); // Indicates whether the job is currently active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_lists');
    }
};