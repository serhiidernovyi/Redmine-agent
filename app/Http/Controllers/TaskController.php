<?php

namespace App\Http\Controllers;

use App\Http\Contracts\ISuccess;
use App\Http\Requests\TicketRequest;
use App\Http\Resource\TaskResource;
use App\Service\TaskService;
use Symfony\Component\HttpFoundation\Response;


class TaskController extends Controller
{
    /**
     * @OA\Post(
     * path="/api/tasks",
     * summary="Post task",
     * description="Create task",
     * tags={"tasks"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"progect_id", "priority_id", "subject"},
     *       @OA\Property(property="progect_id", type="number", example="1"),
     *       @OA\Property(property="priority_id", type="number", example="1"),
     *       @OA\Property(property="tracker_id", type="number", example="1"),
     *       @OA\Property(property="status_id", type="number", example="1"),
     *       @OA\Property(property="subject", type="string", example="Some name"),
     *       @OA\Property(property="description", type="text", example="Some description"),
     *    ),
     *
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong credentials. Please try again")
     *        )
     *     ),
     *
     * @OA\Response(
     *    response=201,
     *    description="Created",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Created")
     *        )
     *     )
     * )
     */
    public function store(TicketRequest $request, TaskService $service)
    {
        $response = $service->prepareTicket($request);
        if ($response instanceof ISuccess) {
            return response(['message' => $response->getMessage()], Response::HTTP_CREATED);
        }

        return response(['message' => $response->getMessage()], $response->getCode());
    }

    /**
     * @OA\Get(
     * path="/api/tasks",
     * summary="Get tasks",
     * description="Get tasks",
     * tags={"tasks"},
     *
     * @OA\Response(response="200", ref="#/components/responses/tasks_list_response"),
     *
     * )
     */
    public function show(TaskService $service)
    {
        $response = $service->show();
        if ($response instanceof ISuccess) {
            $resource = new TaskResource($response->getObj());

            return $resource->response()->setStatusCode(Response::HTTP_OK);
        }

        return response(['message' => $response->getMessage()], $response->getCode());
    }
}
