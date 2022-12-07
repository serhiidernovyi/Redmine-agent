<?php

namespace Tests\Feature\StoreTask;

use Illuminate\Contracts\Config\Repository as ConfigContract;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class StoreTaskTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->conf = $this->app->make(ConfigContract::class);
        $this->conf->set('redmine.url', 'https://google.com');
        $this->conf->set('redmine.key', 'SomeKey');
        $this->url = config('redmine.url');
    }

    /**
     * @test
     */
    public function test_task_was_created()
    {
        // GIVEN
        Http::fake([$this->url => Http::response('Created', 201)]);
        $credentials = [
            'project_id' => 1,
            'tracker_id' => 1,
            'status_id' => 1,
            'priority_id' => 1,
            'subject' => 'Some text',
            'description' => 'Some text'
        ];

        // WHEN
        $response = $this->json('POST', route('task.store'), $credentials);

        // THEN
        $this->assertEquals(201, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function test_task_failed_unauthorized()
    {
        // GIVEN
        Http::fake([$this->url => Http::response('Unauthorized', 401)]);
        $credentials = [
            'project_id' => 1,
            'tracker_id' => 1,
            'status_id' => 1,
            'priority_id' => 1,
            'subject' => 'Some text',
            'description' => 'Some text'
        ];

        // WHEN
        $response = $this->json('POST', route('task.store'), $credentials);

        // THEN
        $this->assertEquals(401, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function test_task_create_failed_project_id_required()
    {
        // GIVEN
        $credentials = [
            'tracker_id' => 1,
            'status_id' => 1,
            'priority_id' => 1,
            'subject' => 'Some text',
            'description' => 'Some text'
        ];

        // WHEN
        $response = $this->json('POST', route('task.store'), $credentials);

        // THEN
        $this->assertEquals(422, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function test_task_create_failed_priority_id_required()
    {
        // GIVEN
        $credentials = [
            'project_id' => 1,
            'tracker_id' => 1,
            'status_id' => 1,
            'subject' => 'Some text',
            'description' => 'Some text'
        ];

        // WHEN
        $response = $this->json('POST', route('task.store'), $credentials);

        // THEN
        $this->assertEquals(422, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function test_task_create_failed_subject_required()
    {
        // GIVEN
        $credentials = [
            'project_id' => 1,
            'tracker_id' => 1,
            'status_id' => 1,
            'priority_id' => 1,
            'description' => 'Some text'
        ];

        // WHEN
        $response = $this->json('POST', route('task.store'), $credentials);

        // THEN
        $this->assertEquals(422, $response->getStatusCode());
    }
}
