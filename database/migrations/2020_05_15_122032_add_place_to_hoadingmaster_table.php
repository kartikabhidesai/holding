<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlaceToHoadingmasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoadingmaster', function (Blueprint $table) {
            $table->string('code')->after('id');
            $table->string('landmark')->after('code');
            $table->string('area')->after('landmark');
            $table->string('width')->after('size');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoadingmaster', function (Blueprint $table) {
            //
        });
    }
}
