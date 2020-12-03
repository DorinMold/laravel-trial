<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('message_id')->unsigned(); //asa e indicat sa fie pentru a putea fi folosit fara mentiune explicita
            $table->integer('tag_id')->unisgned();
            $table->foreign('message_id')->references('id')->on('messages');
            $table->foreign('tag_id')->references('id')->on('tags');
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
        Schema::dropIfExists('message_tag');
    }
}
