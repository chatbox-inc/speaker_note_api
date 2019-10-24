<?php
namespace Chatbox\SpeakerNote\Http\Actions\Event;

use Chatbox\SpeakerNote\Http\AuthUserTrait;
use Chatbox\SpeakerNote\Model\Event;
use Chatbox\SpeakerNote\Model\User;

class GetAction
{
    use AuthUserTrait;

    public function handle(Event $event)
    {
        return [
            "event" => $event
        ];
    }
}


