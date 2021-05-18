<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiestas', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->integer('max_people');
            $table->date('date');
            $table->double('price');
            $table->boolean('private'); //usar un select SI/NO o un checkbox
            $table->foreignId('user_id')->constrained();//encargado de la fiesta
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
        Schema::dropIfExists('fiestas');
    }
}
