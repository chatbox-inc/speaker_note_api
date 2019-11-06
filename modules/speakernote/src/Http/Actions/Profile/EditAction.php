<?php
namespace Chatbox\SpeakerNote\Http\Actions\Profile;

use Chatbox\SpeakerNote\Http\AuthUserTrait;
use Chatbox\SpeakerNote\Model\User;
use Illuminate\Validation\ValidationException;

class EditAction {
    use AuthUserTrait;

    public function handle(User $user)
    {

        $payload = request()->get("user",[]);
        $val = validator($payload, [
            "user_name" => ["required","max:20"],
            "user_title" => ["required","max:20"],
            "user_profile" => ["required","max:200"]
        ]);

        if($val->fails()){
            throw new ValidationException($val);
        };

        $user->name = Arr::get($payload,"user_name");
        $user->title = Arr::get($payload,"user_title");
        $user->profile = Arr::get($payload, "user_profile");
        $user->save();
    }
}