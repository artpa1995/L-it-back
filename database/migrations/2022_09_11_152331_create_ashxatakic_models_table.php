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
        Schema::create('ashxatakic_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->default("-");
            $table->string('email')->default("-");
            $table->string('stret')->default("-");
            $table->string('posts')->default("-");
            $table->string('hskich')->default("-");
            $table->string('image')->default("-");
            $table->text('description')->nullable();
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
        Schema::dropIfExists('ashxatakic_models');
    }
};
