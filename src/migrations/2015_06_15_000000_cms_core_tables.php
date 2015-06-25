<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsCoreTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->enum('type', ['suadmin', 'admin', 'editor']);
            $table->timestamp('blocked_at')->nullable();
            $table->rememberToken();
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
        Schema::drop('cms_users');
    }
}
