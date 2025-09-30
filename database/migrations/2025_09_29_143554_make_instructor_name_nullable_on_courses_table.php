<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Make instructor_name nullable safely
        if (Schema::hasTable('courses') && Schema::hasColumn('courses', 'instructor_name')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->string('instructor_name')->nullable()->change();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('courses') && Schema::hasColumn('courses', 'instructor_name')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->string('instructor_name')->nullable(false)->change();
            });
        }
    }
};
