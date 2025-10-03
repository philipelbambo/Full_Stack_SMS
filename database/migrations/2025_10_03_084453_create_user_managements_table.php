<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_managements', function (Blueprint $table) {
            $table->id();
            $table->string('name');                         
            $table->string('email')->unique();              
            $table->string('password');                     
            $table->enum('role', ['student', 'staff', 'registrar', 'admin'])->default('student'); 
            $table->boolean('status')->default(true);       
            $table->timestamps();                           
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_managements');
    }
};
