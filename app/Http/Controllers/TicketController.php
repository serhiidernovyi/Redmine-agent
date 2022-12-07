<?php

namespace App\Http\Controllers;

use App\Http\Contracts\ISuccess;
use App\Http\Requests\TicketRequest;
use App\Http\Resource\TicketsResource;
use App\Service\TicketService;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    public function store(TicketRequest $request, TicketService $service)
    {
        $response = $service->prepareTicket($request);
        if ($response instanceof ISuccess) {
            return response(['message' => $response->getMessage()], Response::HTTP_CREATED);
        }

        return response(['message' => $response->getMessage()], $response->getCode());
    }

    public function show(TicketService $service)
    {
        $response = $service->show();
        if ($response instanceof ISuccess) {
            $resource = new TicketsResource($response->getObj());

            return $resource->response()->setStatusCode(Response::HTTP_OK);
        }

        return response(['message' => $response->getMessage()], $response->getCode());
    }
}
