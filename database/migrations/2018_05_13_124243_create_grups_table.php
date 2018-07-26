<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 20)->nullable()->default(null)->comment("называние категории");            
            $table->boolean('action')->nullable()->default(true)->comment("вкл/выкл");

            //создание поля для связывания с таблицей user
            $table->integer("alias_id")->unsigned()->default(1)->comment("внешний ключ категории");

            $table->foreign('alias_id')->references('id')->on('aliases');
            
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
        Schema::dropIfExists('grups');
    }
}
