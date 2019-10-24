<?php
namespace Chatbox\SpeakerNote;

use Chatbox\SpeakerNote\Model\Event;
use Chatbox\SpeakerNote\Model\Talk;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Chatbox\SpeakerNote\Commands;

class SpeakerNoteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../api.php');
        $this->loadMigrationsFrom(__DIR__.'/../migration');

        Route::bind("event_id",function($value){
            $event = Event::where("connpass_event_id",$value)->first();
            if($event){
                return $event;
            }else{
                return abort(404);
            }
        });

        Route::bind("talk_code",function($value){
            $talk = Talk::with(["user","event"])->where("code",$value)->first();
            if($talk){
                return $talk;
            }else{
                return abort(404);
            }
        });


    }

    public function register()
    {
        $this->commands([
            Commands\Connpass\ImportCommand::class,
        ]);
    }

}
