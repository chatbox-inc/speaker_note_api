<?php

use Illuminate\Database\Seeder;
use Chatbox\SpeakerNote\Model\Team;

class SampleEventSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Team::class,5)->create();
    }
}
