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

        Schema::create('t_teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('connpass_series_id')->unique();
            $table->string('team_name');
            $table->string('team_url');
            $table->timestamps();
        });

        Schema::create('t_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('team_id');
            $table->string('connpass_event_id')->unique();
            $table->string('event_name');
            $table->string('event_url');
            $table->dateTime('event_start_at');
            $table->dateTime('event_end_at');
            $table->string('address');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('t_teams');
        });

        Schema::create('t_talks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('event_id');
            $table->string('event_name')->nullable();
            $table->dateTime('event_date')->nullable();
            $table->string('title');
            $table->text('detail');
            $table->string('speaker_name');
            $table->string('speaker_photo');
            $table->string('speaker_profile')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('t_users');
            $table->foreign('event_id')->references('id')->on('t_events');

        });

        Schema::create('t_team_owner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('t_users');
            $table->foreign('team_id')->references('id')->on('t_teams');
        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("t_team_owner");
        Schema::dropIfExists("t_talks");
        Schema::dropIfExists("t_events");
        Schema::dropIfExists("t_teams");
        Schema::dropIfExists("t_users");
        //
    }
}
