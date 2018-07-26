<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 20)->nullable()->default(null)->comment("называние ссылки");            
            $table->string('link', 50)->nullable()->default(null)->comment("направление ссылки");            
            $table->integer('parent')->unsigned()->nullable()->default(0)->comment("дочревные ссылки");            
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
        Schema::dropIfExists('admin_menu_controllers');
    }
}
