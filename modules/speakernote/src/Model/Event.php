<?php
namespace Chatbox\SpeakerNote\Model;

use Chatbox\Larabase\FirebaseUser;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "t_events";

    public function team(){
        return $this->belongsTo(Team::class,"team_id");
    }
}
