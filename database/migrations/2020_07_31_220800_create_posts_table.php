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
            /*  user added code  */
            $table->integer('author_id');
            /*   user added code  */
                   // $table->foreign('author_id')->references('id')->on('users')    ;
            /* user added code */
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('excerpt', rand(8, 15));
            $table->longText('body', rand(15, 35)) ;
            $table->integer('category_id');
            /* just added code */
               // $table->foreign('category_id')->references('id')->on('categories')  ;
            /*  just added code */
            $table->string('image')->nullable();
            $table->dateTime('published_at');

            $table->dateTime('updated_at');
            $table->dateTime('created_at');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
