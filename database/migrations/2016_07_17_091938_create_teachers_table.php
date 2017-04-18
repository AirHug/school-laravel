<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('number', 11);//
            $table->string('name', 10);//
            $table->enum('sex', ["男", "女"]);//
            $table->integer('group');//
            $table->string('mobile', 11);//
            $table->string('idNumber', 18);//
            $table->timestamp('workTime');//
            $table->string('degree', 10);//
            $table->string('school', 50);//
            $table->string('major', 20);//
            $table->string('note', 255);//
            $table->string('password');
            $table->string('photo', 50);//
            $table->string('email', 20);//
            $table->timestamp('registerTime');
            $table->timestamp('loginTime');
            $table->ipAddress('loginIp');
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
        Schema::dropIfExists('teachers');
    }
}
