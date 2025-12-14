<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('national_id', 20)->unique();
            $table->string('phone', 20)->unique();
            $table->string('password');
            $table->enum('role', ['admin','student'])->default('student');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('father_name', 50);
            $table->string('mother_name', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};