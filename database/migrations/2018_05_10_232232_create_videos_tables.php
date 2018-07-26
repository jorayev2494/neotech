<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable()->default("News - title")->comment("главный текст");
            $table->string('video', 50)->nullable()->default("Rasta x Ana Nikolic - Slucajnost.mp4")->comment("название видео");
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
        Schema::dropIfExists('videos');
    }
}
