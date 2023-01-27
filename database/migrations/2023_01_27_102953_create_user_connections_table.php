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
        Schema::create('user_connections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('target_user_id');
            $table->boolean('type')->comment('0: friend, 1: follower');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('user_connections', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('target_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_connections', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['target_user_id']);
        });
        Schema::dropIfExists('user_connections');
    }
};
