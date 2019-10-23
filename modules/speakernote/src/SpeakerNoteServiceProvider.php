<?php
namespace Chatbox\SpeakerNote;

use Illuminate\Support\ServiceProvider;

use Chatbox\SpeakerNote\Commands;

class SpeakerNoteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../api.php');
        $this->loadMigrationsFrom(__DIR__.'/../migration');
    }

    public function register()
    {
        $this->commands([
            Commands\Connpass\ImportCommand::class,
        ]);
    }

}
