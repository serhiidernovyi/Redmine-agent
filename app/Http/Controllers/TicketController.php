<?php

namespace App\Http\Controllers;

use App\Http\Contracts\ISuccess;
use App\Http\Requests\TicketRequest;
use App\Service\TicketService;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    public function create(TicketRequest $request, TicketService $service)
    {
        $response = $service->prepareTicket($request);
        if ($response instanceof ISuccess) {
            return response(['message' => $response->getMessage()], Response::HTTP_CREATED);
        }

        return response(['message' => $response->getMessage()], $response->getCode());
    }
}
