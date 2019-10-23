<?php
namespace Chatbox\SpeakerNote\Http\Actions\Team;

use Chatbox\SpeakerNote\Model\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageActionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $teams = Team::with([])->limit(10)->get();

        $this->assertNotEquals(count($teams),0,"team data must be set before test");

        foreach ($teams as $team) {
            $response = $this->get('/spnote/team/'.$team->connpass_series_id);
            $response->assertStatus(200);
        }

    }
}
