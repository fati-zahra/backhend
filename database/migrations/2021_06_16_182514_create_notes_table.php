<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id('id_nt');
            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('id_etu');
            $table->unsignedBigInteger('id_m');
            $table->integer('note');
            $table->integer('note3');
            $table->integer('note3');
            $table->integer('note4');
            $table->integer('note5');
            $table->integer('note6');

            $table->integer('modul1');
            $table->integer('modul2');
            $table->integer('modul3');
            $table->integer('modul4');
            $table->integer('modul5');
            $table->integer('modul6');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
