<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('slug')->unique()->nullable();

            //pending, accepted, published, canceled
            $table->string('status')->default('pending');
            $table->longText('body')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->unsignedInteger('photo_id')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
