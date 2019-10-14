<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiry', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('mobile')->nullable();
            $table->string('landline')->nullable();
            $table->string('companyname');
            $table->string('email')->unique();
            $table->integer('inquirytime');
            $table->date('inquirydate');
            $table->string('inquirysource');
            $table->enum('status',['open','close']);
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
        Schema::dropIfExists('inquiry');
    }
}
