<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planings', function (Blueprint $table) {
            $table->id('id_p');
            $table->string('salle');
            $table->string('salle2');
            $table->string('salle3');
            $table->string('salle4');
            $table->string('salle5');
            $table->string('salle6');
            $table->string('salle7');
            $table->string('salle8');
            $table->string('salle9');
            $table->string('salle10');
            $table->string('salle11');
            $table->string('salle12');
            $table->string('salle13');
            $table->string('salle14');
            $table->string('salle15');
            $table->string('salle16');

            $table->string('modul1');
            $table->string('modul2');
            $table->string('modul3');
            $table->string('modul4');
            $table->string('modul5');
            $table->string('modul6');
            $table->string('modul7');
            $table->string('modul8');
            $table->string('modul9');
            $table->string('modul10');
            $table->string('modul11');
            $table->string('modul12');
            $table->string('modul13');
            $table->string('modul14');
            $table->string('modul15');
            $table->string('modul16');



            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('id_m');
            //$table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planings');
    }
}
