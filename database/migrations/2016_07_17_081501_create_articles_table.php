<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('catalog');
            $table->string('title', 100);
            $table->text('content');
            $table->string('author', 20);
            $table->string('editor', 20);
            $table->string('resource', 20);
            $table->string('keyword', 255);
            $table->string('file', 50);
            $table->string('fileName', 50);
            $table->string('image', 50);
            $table->integer('count');
            $table->boolean('isPass')->default(false);
            $table->string('checker', 20);
            $table->boolean('isTop')->default(false);
            $table->boolean('isCommand')->default(false);
            $table->boolean('isSpecial')->default(false);
            $table->timestamp('publish_at');
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
        Schema::dropIfExists('articles');
    }
}
