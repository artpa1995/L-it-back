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
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('home_page_title');
            $table->text('home_page_content');
            $table->string('about_page_title');
            $table->text('about_page_content');
            $table->string('service_page_title');
            $table->text('service_page_content');
            $table->string('contact_page_title');
            $table->text('contact_page_content');
            $table->string('team_page_title');
            $table->text('team_page_content');
           
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
        Schema::dropIfExists('headers');
    }
};









