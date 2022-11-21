<?php

namespace Tests\Feature;

use App\Context;
use App\Http\Controllers\MyController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery\MockInterface;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_mocking_object_is_work()
    {
        $this->mock(Context::class, function (MockInterface $mock) {
            $mock->shouldReceive('perform')->once()->andReturn(5);
        });

        // app(MyController::class)->execute();
        $this->get('/my-controller-execute')
        ->assertSee(50);
        
    }
}
