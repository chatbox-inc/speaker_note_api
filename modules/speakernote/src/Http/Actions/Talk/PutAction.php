<?php
namespace Chatbox\SpeakerNote\Http\Actions\Login;

use Chatbox\SpeakerNote\Http\AuthUserTrait;
use Chatbox\SpeakerNote\Model\User;

class PutAction
{
    use AuthUserTrait;

    public function handle()
    {
        $fbuser = $this->fbUser();

        if($fbuser){
            $user = (new User())->findByFbUser($fbuser) ?: new User();
            $fbuser = $user->fillByFbUser($fbuser);
            $fbuser->save();

            return [
                "user" => $user
            ];
        }else{
            abort(403);
        }

    }
}


