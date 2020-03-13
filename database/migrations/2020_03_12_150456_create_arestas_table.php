<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arestas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('starts');
            $table->foreign('starts')->references('id')->on('vertices')->onDelete('cascade');
            $table->unsignedBigInteger('ends');
            $table->foreign('ends')->references('id')->on('vertices')->onDelete('cascade');
            $table->integer('distance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arestas');
    }
}
