<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToSessionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained(); // Ajusta según tus necesidades
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
