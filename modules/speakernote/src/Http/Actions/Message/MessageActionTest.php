<?php
namespace Chatbox\SpeakerNote\Http\Actions\Message;

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
        $response = $this->get('/spnote/message');

        $response->assertStatus(200);
    }
}
