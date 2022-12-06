<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Illuminate\Contracts\Config\Repository as ConfigContract;

class PostTaskTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->conf = $this->app->make(ConfigContract::class);
        $this->conf->set('redmine.url', 'https://google.com');
        $this->conf->set('redmine.key', 'SomeKey');
        $this->url =  config('redmine.url');
    }

    /**
     * @feature Task
     *
     * @test
     */
    public function test_task_was_created()
    {
        // GIVEN
        Http::fake([$this->url => Http::response('Created', 201)]);
        $credentials = [
            'project_id'=> 1,
            'tracker_id'=> 1,
            'status_id' => 1,
            'priority_id'=> 1,
            'subject'=> 'Some text',
            'description'=> 'Some text'
        ];

        // WHEN
        $response = $this->json('POST', route('ticket.create'), $credentials);

        // THEN
        $this->assertEquals(201, $response->getStatusCode());
    }
}
