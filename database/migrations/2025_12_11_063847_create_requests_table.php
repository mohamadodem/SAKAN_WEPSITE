<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_id')->constrained()->onDelete('restrict');
            $table->text('description')->nullable();
            $table->enum('status', ['pending','accepted','rejected'])->default('pending');
            $table->timestamps();
            
            // شرط: طالب واحد فقط له طلب pending أو accepted
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};