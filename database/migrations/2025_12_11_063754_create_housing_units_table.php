<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('housing_units', function (Blueprint $table) {
            $table->id();
            $table->string('unit_name', 100);
            $table->enum('unit_gender', ['male','female']);
            $table->integer('max_room_capacity');
            $table->integer('total_rooms')->default(0);
            $table->integer('occupied_rooms')->default(0);
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('housing_units');
    }
};