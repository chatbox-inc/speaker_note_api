<?php
namespace Chatbox\SpeakerNote\Http\Actions\Talk;

use Chatbox\SpeakerNote\Http\AuthUserTrait;
use Chatbox\SpeakerNote\Model\Event;
use Chatbox\SpeakerNote\Model\Talk;
use Chatbox\SpeakerNote\Model\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class DeleteAction
{
    use AuthUserTrait;

    public function handle(Talk $talk)
    {
        $talk->delete();
    }
}