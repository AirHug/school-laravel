<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('powers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string("name", 50);

            $table->boolean("addArticle")->default(false);
            $table->boolean("passArticle")->default(false);

            $table->boolean("addTeacherNote")->default(false);
            $table->boolean("passTeacherNote")->default(false);

            $table->boolean("addStudentNote")->default(false);
            $table->boolean("passStudentNote")->default(false);

            $table->boolean("addResource")->default(false);
            $table->boolean("passResource")->default(false);

            $table->boolean("addCourse")->default(false);
            $table->boolean("passCourse")->default(false);

            $table->boolean("addNotice")->default(false);
            $table->boolean("passNotice")->default(false);

            $table->boolean("Asset")->default(false);

            $table->boolean("friendLink")->default(false);
            $table->boolean("Catalogs")->default(false);
            $table->boolean("Teacher")->default(false);
            $table->boolean("Power")->default(false);
            $table->boolean("Student")->default(false);
            $table->boolean("Class")->default(false);
            $table->boolean("Advertisement")->default(false);
            $table->boolean("Banner")->default(false);
            $table->boolean("Application")->default(false);

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
        Schema::dropIfExists('powers');
    }
}
