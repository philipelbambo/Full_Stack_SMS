<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Only add missing columns if the table exists
        if (Schema::hasTable('students')) {
            Schema::table('students', function (Blueprint $table) {
                if (!Schema::hasColumn('students', 'name')) {
                    $table->string('name');
                }
                if (!Schema::hasColumn('students', 'gender')) {
                    $table->string('gender');
                }
                if (!Schema::hasColumn('students', 'email')) {
                    $table->string('email')->unique();
                }
                if (!Schema::hasColumn('students', 'dob')) {
                    $table->date('dob');
                }
                if (!Schema::hasColumn('students', 'age')) {
                    $table->integer('age');
                }
                if (!Schema::hasColumn('students', 'created_at')) {
                    $table->timestamps();
                }
            });
        } else {
            // Create the table if it does not exist
            Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('gender');
                $table->string('email')->unique();
                $table->date('dob');
                $table->integer('age');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Optional: do not drop table to preserve data
        // Schema::dropIfExists('students');
    }
};
