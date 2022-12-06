<?php

namespace App\Models\RequestData;

use App\Http\Contracts\ITicketRequest;

class TicketData
{
    public static function getTicket(ITicketRequest $request): array
    {
        return [
            'issue' => [
                'project_id'=> $request->getProjectId(),
                'tracker_id'=> $request->getTrackerId(),
                'status_id'=> $request->getStatusId(),
                'priority_id'=> $request->getPriorityId(),
                'subject'=> $request->getSubject(),
                'description'=> $request->getDescription()
            ]
        ];
    }
}
