<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number', 20);
            $table->foreignId('housing_unit_id')->constrained()->onDelete('restrict');
            $table->integer('occupied')->default(0);
            $table->timestamps();
            
            $table->unique(['room_number', 'housing_unit_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};