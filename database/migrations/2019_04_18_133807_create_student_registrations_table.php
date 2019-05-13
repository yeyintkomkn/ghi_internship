<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('year_level');
            $table->string('degree_program');
            $table->string('email');
            $table->string('phone');
            $table->string('network_provider');
            $table->string('dob');
            $table->text('pre_address');
            $table->text('per_address');
            $table->string('emergency_phone');
            $table->string('relationship');
            $table->string('emergency_address');
            $table->text('emergency_detail_address');
            $table->string('id_photo');
            $table->string('high_school_name');
            $table->text('curricular_activities');
            $table->string('curricular_participation');
            $table->text('skill');
            $table->string('family_monthly_income');
            $table->string('scholarship');
            $table->string('sponsor');
            $table->string('after_college_plan');
            $table->text('comment');
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
        Schema::dropIfExists('student_registrations');
    }
}
