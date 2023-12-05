<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNotificationToClientsTable extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->integer('notification')->default(0);
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('notification');
        });
    }
}

