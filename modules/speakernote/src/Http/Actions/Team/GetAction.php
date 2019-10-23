<?php
namespace Chatbox\SpeakerNote\Http\Actions\Team;

use Chatbox\SpeakerNote\Http\AuthUserTrait;
use Chatbox\SpeakerNote\Model\Team;
use Chatbox\SpeakerNote\Model\User;

class GetAction
{
    use AuthUserTrait;

    public function handle($seriesId)
    {
        $team = Team::where("connpass_series_id",$seriesId)->first();
        if(!$team){
            abort(404);
        }

        return [
            "team" => $team
        ];
    }
}


