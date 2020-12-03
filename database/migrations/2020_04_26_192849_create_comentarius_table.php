<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarii', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->text('comentariu');
            $table->boolean('aprobat');
            $table->integer('mesaj_id')->unsigned();
            $table->timestamps();

            $table->foreign('mesaj_id')->references('id')->on('mesaje')->onDelete('cascade');

        });

        // Schema::table('comentarii', function(Blueprint $table) {
        //     $table->foreign('mesaj_id')->references('id')->on('mesaje')->onDelete('cascade');
        // })

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarii');
    }
}
