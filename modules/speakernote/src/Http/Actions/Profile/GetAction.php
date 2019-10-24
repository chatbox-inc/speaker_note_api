<?php
namespace Chatbox\SpeakerNote\Http\Actions\Profile;

use Chatbox\SpeakerNote\Http\AuthUserTrait;
use Chatbox\SpeakerNote\Model\User;

class GetAction
{
    use AuthUserTrait;

    public function handle()
    {
        $fbuser = $this->fbUser();

        if($fbuser){
            $user = (new User())->findByFbUser($fbuser);
            if(!$user){
                $user = new User();
                $user->title = "";
                $user->profile = "";
            }
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


