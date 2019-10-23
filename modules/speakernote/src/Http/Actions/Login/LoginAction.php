<?php
namespace Chatbox\SpeakerNote\Http\Actions\Login;

use Chatbox\SpeakerNote\Http\AuthUserTrait;
use Chatbox\SpeakerNote\Model\User;

class LoginAction
{
    use AuthUserTrait;

    public function handle()
    {
        $fbuser = $this->fbUser();

        $user = (new User())->findByFbUser($fbuser) ?: new User();
        $fbuser = $user->fillByFbUser($fbuser);
        $fbuser->save();

        return [];
    }
}


