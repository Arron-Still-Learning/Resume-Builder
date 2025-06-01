<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->default(1);
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('full_name');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('email');
            $table->date('date_of_birth')->nullable();
            $table->string('photo_path')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_details_id');
            $table->foreign('personal_details_id')->references('id')->on('personal_details')->onDelete('cascade');
            $table->string('designation')->nullable();
            $table->timestamps();
        });

        Schema::create('objectives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_details_id');
            $table->foreign('personal_details_id')->references('id')->on('personal_details')->onDelete('cascade');
            $table->string('objective')->nullable();
            $table->timestamps();
        });

        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_details_id');
            $table->foreign('personal_details_id')->references('id')->on('personal_details')->onDelete('cascade');
            $table->string('skill_name')->nullable();
            $table->enum('skill_level', ['Beginner', 'Intermediate', 'Advanced', 'Expert', 'Master'])->nullable();
            $table->timestamps();
        });

        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_details_id');
            $table->foreign('personal_details_id')->references('id')->on('personal_details')->onDelete('cascade');
            $table->string('institution')->nullable();
            $table->string('degree')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });

        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_details_id');
            $table->foreign('personal_details_id')->references('id')->on('personal_details')->onDelete('cascade');
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_details_id');
            $table->foreign('personal_details_id')->references('id')->on('personal_details')->onDelete('cascade');
            $table->string('language_name')->nullable();
            $table->enum('proficiency', ['Beginner', 'Intermediate', 'Advanced', 'Fluent', 'Native'])->nullable();
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_details_id');
            $table->foreign('personal_details_id')->references('id')->on('personal_details')->onDelete('cascade');
            $table->string('project_name')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('projects');
        Schema::dropIfExists('languages');
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('educations');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('objectives');
        Schema::dropIfExists('designations');
        Schema::dropIfExists('personal_details');
    }
}
