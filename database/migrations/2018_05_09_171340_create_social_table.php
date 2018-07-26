<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 20)->nullable()->default(null)->comment("называние ссылки");            
            $table->string('link', 20)->nullable()->default(null)->comment("направление ссылки");            
            $table->string('icon')->nullable()->default(null)->comment("ссылки иконка");            
            $table->boolean('action')->nullable()->default(true)->comment("вкл/выкл");
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
        Schema::dropIfExists('social');
    }
}
