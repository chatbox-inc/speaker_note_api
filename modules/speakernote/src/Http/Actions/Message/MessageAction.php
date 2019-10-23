<?php
namespace Chatbox\SpeakerNote\Http\Actions\Message;

use Chatbox\SpeakerNote\Http\AuthUserTrait;
use Chatbox\SpeakerNote\Model\User;

class MessageAction
{
    use AuthUserTrait;

    public function handle()
    {
        return [
            "message" => "hello, this is speaker note"
        ];
    }
}


