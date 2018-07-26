<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAliasesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aliases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable()->default("News - title")->comment("главный текст");
            $table->string('img', 50)->nullable()->default("featured_img_1.jpg")->comment("главный фото");
            $table->text('body')->nullable()->comment("тело текста");
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
        Schema::dropIfExists('aliases');
    }
}
