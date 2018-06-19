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
            $table->integer('user_id');
            $table->date('start_date');
            $table->date('end_date');	
            $table->time('start_time');	
            $table->string('interval');
            $table->text('message');
            $table->enum('status', ['active', 'inactive','completed','deleted']); 
            $table->enum('type', ['text', 'email','post']);
            $table->enum('interval_type', ['daily', 'hourly','min']);
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
