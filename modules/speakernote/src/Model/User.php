<?php
namespace Chatbox\SpeakerNote\Model;

use Chatbox\Larabase\FirebaseUser;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "t_user";

    public function findByFbUser(FirebaseUser $user):?User{
        return $this->newInstance()->where("uid",$user->uid)->first();
    }

    public function fillByFbUser(FirebaseUser $user){
        $model = $this;
        $model->uid = $user->uid;
        $model->email = $user->email;
        $model->display_name = $user->displayName;
        $model->photo_url = $user->photoUrl;
        return $model;
    }
}
