<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BotanicalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function(Blueprint $table){
            $table->increments('id');
            $table->text('name');
            $table->timestamps();
        });
        Schema::create('seeds',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
        Schema::create('fruits', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
        Schema::create('plants', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->string('specialCares');
            $table->Text('image');
            $table->string('root');
            $table->string('stem');
            $table->string('leaf');
            $table->unsignedInteger('type_id')->unsigned();
            $table->unsignedInteger('seed_id')->unsigned();
            $table->unsignedInteger('fruit_id')->unsigned();
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('seed_id')->references('id')->on('seeds');
            $table->foreign('fruit_id')->references('id')->on('fruits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
        Schema::dropIfExists('seeds');
        Schema::dropIfExists('fruits');
    }
}
