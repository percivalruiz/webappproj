<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationAndUserDetailsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_donation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('status')->default('');
            $table->string('status_details')->default('');
            $table->string('slug')->default('');
            $table->timestamps();
        });

        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('date_of_req')->default('');
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('date_of_birth')->default('');
            $table->string('display_photo')->default('');
            $table->integer('age')->unsigned()->default(0);
            $table->integer('weight')->unsigned()->default(0);
            $table->string('contact_number')->default('');
            $table->string('sex')->default('');
            $table->string('profession')->default('');
            $table->string('blood_type')->default('');
            $table->string('slug')->default('');
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
        Schema::drop('user_donation');
        Schema::drop('user_details');
    }
}
