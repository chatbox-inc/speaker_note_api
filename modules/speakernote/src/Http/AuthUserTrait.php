<?php
namespace Chatbox\SpeakerNote\Http;

use Chatbox\Larabase\FirebaseUser;
use Chatbox\SpeakerNote\Model\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

trait AuthUserTrait
{
    protected function fbUser():?FirebaseUser{
        $user = Auth::guard("firebase_idtoken")->user();
        return $user;
    }

    protected function findUserByAuth():?User{
        $user = Auth::guard("firebase_idtoken")->user();
        $user = (new User())->findByFbUser($user);
        return $user;
    }

    protected function authenUser():User{
        $user = $this->findUserByAuth();
        if($user){
            return $user;
        }else{
            throw new AuthenticationException();
        }
    }

}
