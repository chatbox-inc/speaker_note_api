<?php
namespace Chatbox\SpeakerNote\Http\Actions\Login;

use Chatbox\Larabase\Testing\TestFirebaseUser;
use Chatbox\SpeakerNote\Model\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class LoginActionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        if(!TestFirebaseUser::users()){
            $token = Str::random();
            $user = TestFirebaseUser::fake()->recordAs($token);
            // Store firebase user to database or ...
            $this->withHeader("Authorization", "Bearer $token");
        }else{
            TestFirebaseUser::remenber(function($token, $user){
                $this->withHeader("Authorization", "Bearer $token");
            });
        }
        config()->set("app.url","http://localhost/");
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->post('/spnote/login');
        $response->assertStatus(200);
        $user = $response->json("user");
        assert(User::where("uid",$user["uid"])->first() !== null);
    }
}
