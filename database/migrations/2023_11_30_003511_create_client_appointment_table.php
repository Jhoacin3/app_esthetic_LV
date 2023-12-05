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
        Schema::create('client_appointment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->foreignId('appointment_id');
            $table->date('appointment_date');
            $table->string('client_phone');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_appointment');
    }
};
