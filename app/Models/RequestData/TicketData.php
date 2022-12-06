<?php

namespace App\Models\RequestData;

use App\Http\Contracts\ITicketRequest;

class TicketData
{
    public static function getTicket(ITicketRequest $request): array
    {
        return [
            'project_id'=> 4,
            'tracker_id'=> 6,
            'status_id'=> 5,
            'priority_id'=> 2,
            'category_id'=> 6,
            'subject'=> "Example",
            'description'=> "Example description"
        ];
    }
}