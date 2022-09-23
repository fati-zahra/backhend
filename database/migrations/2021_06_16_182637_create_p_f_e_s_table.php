<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePFESTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_f_e_s', function (Blueprint $table) {
            $table->id('id_pfe');
            $table->unsignedBigInteger('user_id');

            $table->unsignedInteger('id_p');
            $table->unsignedBigInteger('id_etu');
            $table->string('subject');
            $table->string('profsr');
            $table->string('etu');

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
        Schema::dropIfExists('p_f_e_s');
    }
}
