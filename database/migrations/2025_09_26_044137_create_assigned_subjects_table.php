<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assigned_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('faculty_name');
            $table->string('subject_name');
            $table->string('course')->nullable();
            $table->string('semester')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assigned_subjects');
    }
};
