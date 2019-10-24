<?php
namespace Chatbox\SpeakerNote\Model;

use Chatbox\Larabase\FirebaseUser;
use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    const STAUS_PENDING="pending";
    const STAUS_REJECTED="rejected";
    const STAUS_ACCEPTED="accepted";

    protected $table = "t_talks";

    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }

    public function event(){
        return $this->belongsTo(Event::class,"event_id");
    }

}
