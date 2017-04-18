<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('number', 11);
            $table->integer('class');
            $table->string('name', 10);
            $table->string('password');
            $table->timestamp('loginTime');
            $table->ipAddress('loginIp');
            $table->string('photo', 50);
            $table->enum('sex', ["男", "女"]);
            $table->timestamp('birthday');
            $table->string('idType', 10);
            $table->string('idNum', 20);
            $table->string('enrollObject', 20);
            $table->string('enrollType', 20);
            $table->string('nameSpell', 30);
            $table->string('type', 20);
            $table->string('studyType', 20);
            $table->string('entranceType', 20);
            $table->boolean('isResident');
            $table->string('nation', 20);
            $table->boolean('isHMTO');
            $table->boolean('isMarried');
            $table->string('trainStation', 20);
            $table->boolean('followingChild');
            $table->string('sourceCode', 15);
            $table->string('birthCode', 15);
            $table->string('nativeCode', 15);
            $table->string('address', 50);
            $table->string('policeStation', 50);
            $table->string('accountCode', 20);
            $table->string('accountType', 20);
            $table->string('dwellingType', 50);
            $table->string('grade', 4);
            $table->string('season', 4);
            $table->string('date', 50);
            $table->string('major', 20);
            $table->string('native', 20);
            $table->string('politics', 10);
            $table->string('health', 20);
            $table->string('source', 20);
            $table->string('mobile', 11);
            $table->boolean('isCooperate');
            $table->string('cooperateType', 30);
            $table->string('cooperateSchool', 30);
            $table->string('outSchoolPoint', 50);
            $table->string('segmentFoster', 30);
            $table->string('englishName', 50);
            $table->string('contact', 30);
            $table->string('homeAddress', 30);
            $table->string('homeCode', 30);
            $table->string('homePhone', 30);

            $table->string('memberName1', 30);//
            $table->string('memberRelation1', 10);//
            $table->boolean('isGuardian1');//
            $table->string('memberPhone1', 30);//
            $table->timestamp('memberBirthday1');//
            $table->string('memberIdType1', 10);//
            $table->string('memberIdNumber1', 18);//
            $table->string('memberNative1', 30);//
            $table->string('memberPolitics1', 10);//
            $table->string('memberHealth1', 10);//
            $table->string('memberWork1', 30);//
            $table->string('memberDuty1', 10);//

            $table->string('memberName2', 30);//
            $table->string('memberRelation2', 10);//
            $table->boolean('isGuardian2');//
            $table->string('memberPhone2', 30);//
            $table->timestamp('memberBirthday2');//
            $table->string('memberIdType2', 10);//
            $table->string('memberIdNumber2', 18);//
            $table->string('memberNative2', 30);//
            $table->string('memberPolitics2', 10);//
            $table->string('memberHealth2', 10);//
            $table->string('memberWork2', 30);//
            $table->string('memberDuty2', 10);//

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
        Schema::dropIfExists('students');
    }
}
