<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('student_complaints', function (Blueprint $table) {
            // Add the column only if it doesn't exist
            if (!Schema::hasColumn('student_complaints', 'student_name')) {
                $table->string('student_name')->after('id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('student_complaints', function (Blueprint $table) {
            // Drop the column only if it exists
            if (Schema::hasColumn('student_complaints', 'student_name')) {
                $table->dropColumn('student_name');
            }
        });
    }
};
