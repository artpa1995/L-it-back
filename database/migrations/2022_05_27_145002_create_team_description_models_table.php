<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_description_models', function (Blueprint $table) {
            $table->id();
            //$table->integer('worker_id');
           // $table->foreign('worker_id')->references('id')->on('team_models');
            $table->foreignId('worker_id')->constrained('team_models')->onDelete('cascade');
            $table->string('position');
            $table->text('description');
            $table->string('lang');
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
        Schema::dropIfExists('team_description_models');
    }
};
