<?php

namespace App\Http\Controllers\Responses;

/**
 * @OA\Schema(
 *     schema="task_item_object",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="Task id",
 *     ),
 *     @OA\Property(
 *         property="subject",
 *         type="string",
 *         description="Task name",
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Task description",
 *     ),
 *     @OA\Property(
 *         property="project_id",
 *         type="integer",
 *         description="Project id",
 *     ),
 *     @OA\Property(
 *         property="project_name",
 *         type="string",
 *         description="Project name",
 *     ),
 *     @OA\Property(
 *         property="status_id",
 *         type="integer",
 *         description="Status id",
 *     ),
 *     @OA\Property(
 *         property="status_name",
 *         type="string",
 *         description="Status name",
 *     ),
 *     @OA\Property(
 *         property="is_closed",
 *         type="boolean",
 *         description="Is closed status",
 *     ),
 *     @OA\Property(
 *         property="author_id",
 *         type="integer",
 *         description="Author id",
 *     ),
 *     @OA\Property(
 *         property="author_name",
 *         type="string",
 *         description="Author name",
 *     ),
 * )
 */
class TaskObjectOA
{

}
