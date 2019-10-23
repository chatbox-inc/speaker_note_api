<?php
namespace Chatbox\SpeakerNote\Http\Actions\Event;

use Chatbox\SpeakerNote\Http\AuthUserTrait;
use Chatbox\SpeakerNote\Model\Event;
use Chatbox\SpeakerNote\Model\User;

class GetAction
{
    use AuthUserTrait;

    public function handle($seriesId)
    {
        $team = Event::where("connpass_event_id",$seriesId)->first();
        if(!$team){
            abort(404);
        }

        return [
            "event" => $team
        ];
    }
}


