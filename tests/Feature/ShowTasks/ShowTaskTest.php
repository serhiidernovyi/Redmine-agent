<?php

namespace Tests\Feature\ShowTasks;

use Illuminate\Contracts\Config\Repository as ConfigContract;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ShowTaskTest extends TestCase
{
    use ShowTaskTrait;

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
    public function test_task_show_success()
    {
        // GIVEN
        $issues = $this->getFullIssuees();
        Http::fake([$this->url => Http::response($issues, 200)]);

        // WHEN
        $response = $this->json('GET', route('ticket.show'));

        // THEN
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function test_task_show_issues_without_descriptions_success()
    {
        // GIVEN
        $issues = $this->getIssueesWithoutDescription();
        Http::fake([$this->url => Http::response($issues, 200)]);

        // WHEN
        $response = $this->json('GET', route('ticket.show'));

        // THEN
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStructureJson($response);
    }
}
