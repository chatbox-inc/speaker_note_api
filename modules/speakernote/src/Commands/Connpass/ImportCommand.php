<?php


namespace Chatbox\SpeakerNote\Commands\Connpass;

use Chatbox\SpeakerNote\Model\Team;
use Chatbox\SpeakerNote\Service\ConnpassService;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'connpass:import {event_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ConnpassService $connpassService)
    {
        $event_id = $this->argument("event_id");

        $eventInfo = $connpassService->getConnpassEventById($event_id);

        if($eventInfo === null){
            $this->error("invalid event id");
            exit(1);
        }
        if(Arr::get($eventInfo,"series") === null){
            $this->error("non grouped event");
            exit(1);
        }
        $teamModel = $connpassService->upsertTeam($eventInfo);
        $connpassService->upsertEvent($teamModel, $eventInfo);
    }
}
