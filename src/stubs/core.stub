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

        Schema::create('cms_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('cms_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('path');
            $table->boolean('is_image');
            $table->text('tags')->nullable();
            $table->string('extension');
            $table->timestamps();
        });


        Schema::create('cms_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug_url');
            $table->integer('primary_img')->nullable();
            $table->text('sumary');
            $table->text('body');
            $table->string('title_seo');
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('cms_categories');

            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('cms_users');

            $table->integer('section_id')->nullable();
            $table->integer('views')->default(0);
            $table->date('published_at')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_articles');
        Schema::drop('cms_categories');
        Schema::drop('cms_users');
    }
}
