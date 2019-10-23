<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSPNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid');
            $table->string('email');
            $table->string('display_name');
            $table->string('photo_url');
            $table->timestamps();
        });

        Schema::create('t_talks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id')->nullable();
            $table->string('event_name')->nullable();
            $table->dateTime('event_date')->nullable();
            $table->string('title');
            $table->text('detail');
            $table->string('speaker_name');
            $table->string('speaker_photo');
            $table->string('speaker_profile')->nullable();
            $table->timestamps();
        });

        Schema::create('t_team', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('team_name');
            $table->string('team_profile');
            $table->string('team_icon');
            $table->timestamps();
        });

        Schema::create('t_team_owner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('user_id');
            $table->string('event_name');
            $table->string('event_url');
            $table->timestamps();
        });

        Schema::create('t_event', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_name');
            $table->string('event_url');
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
        //
    }
}
