<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->timestamps();
        });
        
        Schema::create('client_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('service_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client_service');

        Schema::dropIfExists('clients');
    }

};
