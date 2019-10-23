<?php
namespace Chatbox\SpeakerNote\Http\Actions\Event;

use Chatbox\SpeakerNote\Model\Event;
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
        $events = Event::with([])->limit(10)->get();

        $this->assertNotEquals(count($events),0,"event data must be set before test");

        foreach ($events as $event) {
            $response = $this->get('/spnote/event/'.$event->connpass_event_id);
            $response->assertStatus(200);
        }

    }
}
