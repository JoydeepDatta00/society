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
        Schema::create('auditorium', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('description');
            $table->string('address');
            $table->string('auditorium_image')->nullable();
            $table->string('seating_capacity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditorium');
    }
};
