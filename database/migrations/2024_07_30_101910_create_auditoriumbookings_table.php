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
        Schema::create('auditoriumbookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('organization_name');
            $table->string('services');
            $table->string('choose_auditorium');
            $table->string('auditorium_hall');
            $table->string('choose_slots');
            $table->date('date');
            $table->unique(['date', 'choose_slots']);
            $table->string('allowed_status')->default('pending');
            $table->string('url_for_webcasting')->nullable();
            $table->string('event_name');
            $table->string('event_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audotoriumbookings');
    }
};
