<?php
namespace Chatbox\SpeakerNote\Http;

use Chatbox\SpeakerNote\Model\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

trait AuthUserTrait
{
    protected function fbUser():?User{
        $user = Auth::user();
        return $user;
    }

    protected function findUserByAuth():?User{
        $user = Auth::user();
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
