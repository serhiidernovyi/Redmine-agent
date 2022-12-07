<?php

namespace Tests\Feature\ShowTasks;

use Illuminate\Testing\TestResponse;

trait ShowTaskTrait
{
    public function getFullIssuees()
    {
        return [
            "issues" => [
                ["id" => 1,
                    "project" => ["id" => 1, "name" => "test"],
                    "tracker" => ["id" => 1, "name" => "T1"],
                    "status" => ["id" => 1, "name" => "pending", "is_closed" => false],
                    "priority" => ["id" => 1, "name" => "Hi"],
                    "author" => ["id" => 1, "name" => "Redmine Admin"],
                    "subject" => "Example one",
                    "description" => "Example description one",
                    "start_date" => "2022-12-06",
                    "due_date" => null,
                    "done_ratio" => 0,
                    "is_private" => false,
                    "estimated_hours" => null,
                    "total_estimated_hours" => null,
                    "created_on" => "2022-12-06T23:57:42Z",
                    "updated_on" => "2022-12-06T23:57:42Z",
                    "closed_on" => null
                ],
                [
                    "id" => 2,
                    "project" => ["id" => 1, "name" => "test"],
                    "tracker" => ["id" => 1, "name" => "T1"],
                    "status" => ["id" => 1, "name" => "pending", "is_closed" => false],
                    "priority" => ["id" => 1, "name" => "Hi"],
                    "author" => ["id" => 1, "name" => "Redmine Admin"],
                    "subject" => "Example two",
                    "description" => "Example description two",
                    "start_date" => "2022-12-06",
                    "due_date" => null,
                    "done_ratio" => 0,
                    "is_private" => false,
                    "estimated_hours" => null,
                    "total_estimated_hours" => null,
                    "created_on" => "2022-12-06T23:57:42Z",
                    "updated_on" => "2022-12-06T23:57:42Z",
                    "closed_on" => null
                ]
            ]
        ];
    }

    public function getIssueesWithoutDescription()
    {
        return [
            "issues" => [
                ["id" => 1,
                    "project" => ["id" => 1, "name" => "test"],
                    "tracker" => ["id" => 1, "name" => "T1"],
                    "status" => ["id" => 1, "name" => "pending", "is_closed" => false],
                    "priority" => ["id" => 1, "name" => "Hi"],
                    "author" => ["id" => 1, "name" => "Redmine Admin"],
                    "subject" => "Example one",
                    "start_date" => "2022-12-06",
                    "due_date" => null,
                    "done_ratio" => 0,
                    "is_private" => false,
                    "estimated_hours" => null,
                    "total_estimated_hours" => null,
                    "created_on" => "2022-12-06T23:57:42Z",
                    "updated_on" => "2022-12-06T23:57:42Z",
                    "closed_on" => null
                ],
                [
                    "id" => 2,
                    "project" => ["id" => 1, "name" => "test"],
                    "tracker" => ["id" => 1, "name" => "T1"],
                    "status" => ["id" => 1, "name" => "pending", "is_closed" => false],
                    "priority" => ["id" => 1, "name" => "Hi"],
                    "author" => ["id" => 1, "name" => "Redmine Admin"],
                    "subject" => "Example two",
                    "description" => "Example description two",
                    "start_date" => "2022-12-06",
                    "due_date" => null,
                    "done_ratio" => 0,
                    "is_private" => false,
                    "estimated_hours" => null,
                    "total_estimated_hours" => null,
                    "created_on" => "2022-12-06T23:57:42Z",
                    "updated_on" => "2022-12-06T23:57:42Z",
                    "closed_on" => null
                ]
            ]
        ];
    }

    public function getIssueesWithoutAuthor()
    {
        return [
            "issues" => [
                ["id" => 1,
                    "project" => ["id" => 1, "name" => "test"],
                    "tracker" => ["id" => 1, "name" => "T1"],
                    "status" => ["id" => 1, "name" => "pending", "is_closed" => false],
                    "priority" => ["id" => 1, "name" => "Hi"],
                    "subject" => "Example one",
                    "description" => "Example description two",
                    "start_date" => "2022-12-06",
                    "due_date" => null,
                    "done_ratio" => 0,
                    "is_private" => false,
                    "estimated_hours" => null,
                    "total_estimated_hours" => null,
                    "created_on" => "2022-12-06T23:57:42Z",
                    "updated_on" => "2022-12-06T23:57:42Z",
                    "closed_on" => null
                ],
                [
                    "id" => 2,
                    "project" => ["id" => 1, "name" => "test"],
                    "tracker" => ["id" => 1, "name" => "T1"],
                    "status" => ["id" => 1, "name" => "pending", "is_closed" => false],
                    "priority" => ["id" => 1, "name" => "Hi"],
                    "author" => ["id" => 1, "name" => "Redmine Admin"],
                    "subject" => "Example two",
                    "description" => "Example description two",
                    "start_date" => "2022-12-06",
                    "due_date" => null,
                    "done_ratio" => 0,
                    "is_private" => false,
                    "estimated_hours" => null,
                    "total_estimated_hours" => null,
                    "created_on" => "2022-12-06T23:57:42Z",
                    "updated_on" => "2022-12-06T23:57:42Z",
                    "closed_on" => null
                ]
            ]
        ];
    }

    /**
     * @param TestResponse $response
     *
     * @return void
     */
    protected function assertStructureJson(TestResponse $response): void
    {
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'project_id',
                    'project_name',
                    'status_id',
                    'status_name',
                    'is_closed',
                    'author_id',
                    'author_name',
                    'subject',
                    'description',
                ],
            ],
        ]);
    }
}
