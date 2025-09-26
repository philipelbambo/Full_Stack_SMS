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
        Schema::table('student_complaints', function (Blueprint $table) {
            // ✅ Add student_name column
            $table->string('student_name')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_complaints', function (Blueprint $table) {
            // ✅ Drop student_name if rolled back
            $table->dropColumn('student_name');
        });
    }
};
