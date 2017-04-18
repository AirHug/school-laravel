<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string("name", 50);
            $table->integer("teacher_id");
            $table->string("dayOfWeek", 50);
            $table->string("classTime", 50);
            $table->integer("count");
            $table->integer("selected")->default(0);
            $table->string("sex");
            $table->integer("class")->default(0);
            $table->integer("major")->default(0);
            $table->boolean("isPass")->default(false);
            $table->integer("isClose")->default(false);
            $table->string("checker", 20);
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
        Schema::dropIfExists('courses');
    }
}
