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
        Schema::create('auditoriumhalls', function (Blueprint $table) {
            $table->id();
            $table->string('auditorium_hall_name');
            $table->unsignedBigInteger('auditorium_id');
            $table->foreign('auditorium_id')->references('id')->on('auditorium')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditoriumhalls');
    }
};
