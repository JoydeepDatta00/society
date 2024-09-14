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
        Schema::create('addpromotions', function (Blueprint $table) {
            $table->id();
            $table->string('promotion_image')->nullable();
            $table->string('promotion_link')->nullable();
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->references('id')->on('auditoriumbookings');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addpromotions');
    }
};
