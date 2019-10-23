<?php
namespace Chatbox\SpeakerNote;

use Illuminate\Support\ServiceProvider;

class SpeakerNoteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../api.php');
        $this->loadMigrationsFrom(__DIR__.'/../migration');
    }

    public function register()
    {



    }

}
