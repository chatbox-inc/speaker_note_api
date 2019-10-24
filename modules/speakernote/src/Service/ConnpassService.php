<?php
namespace Chatbox\SpeakerNote\Service;


use Carbon\Carbon;
use Chatbox\SpeakerNote\Model\Event;
use Chatbox\SpeakerNote\Model\Team;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;

class ConnpassService
{
    public function getConnpassEventById($event_id):?array{
        $url = "https://connpass.com/api/v1/event/?event_id={$event_id}";
        $response = (new Client())->request("GET",$url);
        $content = $response->getBody()->getContents();
        $content = json_decode($content,true);
        if(Arr::get($content,"results_returned") !== 1){
            return null;
        }else{
            return Arr::get($content,"events.0");
        }
    }

    public function upsertTeam(array $eventInfo):Team{
        $seriesId = Arr::get($eventInfo,"series.id");
        $seriesTitle = Arr::get($eventInfo,"series.title");
        $seriesUrl = Arr::get($eventInfo,"series.url");

        $team = Team::where("connpass_series_id",$seriesId)->first();
        if(!$team){
            $team = new Team();
            $team->connpass_series_id = $seriesId;
        }
        $team->team_name = $seriesTitle;
        $team->team_url = $seriesUrl;
        $team->save();
        return $team;
    }

    public function upsertEvent(Team $teamModel, array $eventInfo):Event{
        $eventId = Arr::get($eventInfo,"event_id");
        $eventTitle = Arr::get($eventInfo,"title");
        $eventUrl = Arr::get($eventInfo,"event_url");
        $eventStartedat = Carbon::createFromFormat(DATE_ATOM,Arr::get($eventInfo,"started_at"));
        $eventEndedat = Carbon::createFromFormat(DATE_ATOM,Arr::get($eventInfo,"ended_at"));
        $eventAddress = Arr::get($eventInfo,"address");

        $event = Event::where("connpass_event_id",$eventId)->first();
        if(!$event){
            $event = new Event();
            $event->connpass_event_id = $eventId;
        }
        $event->event_name = $eventTitle;
        $event->event_url = $eventUrl;
        $event->event_start_at = $eventStartedat;
        $event->event_end_at = $eventEndedat;
        $event->address = $eventAddress;
        $event->team()->associate($teamModel);
        $event->save();
        return $event;

    }



}
