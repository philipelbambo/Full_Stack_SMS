<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('course_histories', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('course_name');
            $table->string('grade')->nullable();
            $table->date('completion_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_histories');
    }
};
