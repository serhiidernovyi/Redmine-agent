<?php

namespace App\Http\Controllers\OpenApi;

/**
 * @OA\Response(
 *     response="tasks_list_response",
 *     description="Tasks list response.",
 *     @OA\JsonContent(
 *         allOf={
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="data",
 *                     type="array",
 *                     @OA\Items(ref="#/components/schemas/task_item_object"),
 *                 ),
 *             ),
 *         }
 *     ),
 * )
 */
class TasksResponseOA
{
}
