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
        Schema::create('student_complaints', function (Blueprint $table) {
            $table->id();
            $table->string('student_name'); // store student name directly
            $table->string('title');        // complaint title
            $table->text('description');    // details of complaint
            $table->timestamps();           // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_complaints');
    }
};
