<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {            
            $table->integer('provider_id')->unsigned()->nullable()->default(null); 
            $table->string('provider', 100)->nullable()->default(env("PROVIDER"));            
            // $table->string('displayName', 100)->nullable()->default("no-display-name");            
            // $table->string('first_name', 50)->nullable()->default('no-first-name');            
            $table->string('last_name', 50)->nullable()->default('no-last-name');
            $table->string('avatar', 100)->nullable()->default('no-avatar');            
            $table->string('avatar_original', 150)->nullable()->default('no-avatar_original');
            $table->string('provider_token', 200)->nullable()->default('no-token');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
