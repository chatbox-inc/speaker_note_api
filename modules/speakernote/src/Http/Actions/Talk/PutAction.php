<?php
namespace Chatbox\SpeakerNote\Http\Actions\Talk;

use Chatbox\SpeakerNote\Http\AuthUserTrait;
use Chatbox\SpeakerNote\Model\Event;
use Chatbox\SpeakerNote\Model\Talk;
use Chatbox\SpeakerNote\Model\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PutAction
{
    use AuthUserTrait;

    public function handle(Event $event)
    {
        $user = $this->authenUser();

        $payload = request()->get("talk",[]);
        $val = validator($payload,[
            "talk_title" => ["required","max:20"],
            "talk_summary" => ["required","max:200"],
            "user_name" => ["required","max:20"],
            "user_img" => ["required","url"],
            "user_title" => ["required","max:20"],
            "user_profile" => ["required","max:200"],
        ]);

        if($val->fails()){
            throw new ValidationException($val);
        }

        $talk = new Talk();
        $talk->code = Str::random();
        $talk->title = Arr::get($payload,"talk_title");
        $talk->detail = Arr::get($payload,"talk_title");
        $talk->speaker_name = Arr::get($payload,"user_name");
        $talk->speaker_title = Arr::get($payload,"user_title");
        $talk->speaker_photo = Arr::get($payload,"user_img");
        $talk->speaker_profile = Arr::get($payload,"user_profile");
        $talk->status = Talk::STAUS_PENDING;
        $talk->event()->associate($event);
        $talk->user()->associate($user);
        $talk->save();

        return [
            "talk" => $talk
        ];

    }
}


