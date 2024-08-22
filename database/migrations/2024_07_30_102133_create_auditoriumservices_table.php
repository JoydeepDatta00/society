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
        Schema::create('auditoriumservices', function (Blueprint $table) {
            $table->id();
            $table->string('services_name');
            $table->string('service_cost');
             $table->string('service_note');
             $table->unsignedBigInteger('auditorium_id');
            $table->foreign('auditorium_id')->references('id')->on('auditorium')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('auditoriumservices');
    }
};
