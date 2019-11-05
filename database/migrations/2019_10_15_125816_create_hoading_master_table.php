<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadingMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadingmaster', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('location');
            $table->date('startdate');
            $table->date('enddate');
            $table->enum('status',['Available','Not available']);
            $table->integer('type');
            $table->string('budget');
            $table->integer('cart');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadingmaster');
    }
}
