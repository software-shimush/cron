<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender_name');
            $table->string('recipient_name');
            $table->dateTime('start_time');
            $table->dateTime('end_time');	
            $table->integer('interval');
            $table->text('message');
            $table->enum('status', ['active', 'inactive','completed','deleted']);
            $table->enum('type', ['text', 'email','post']);
            $table->timestamps();
            $table->string('destination');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job');
    }
}
