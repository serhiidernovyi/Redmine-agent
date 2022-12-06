<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Service\TicketService;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    public function create(TicketRequest $request, TicketService $service)
    {
        $response = $service->saveIssue($request);
        if ($response) {
            return response(['message' => $response->getMessage()], Response::HTTP_CREATED);
        }

        return response(['message' => $response->getMessage()], Response::HTTP_BAD_REQUEST);
    }
}
