<?php

namespace App\Http\Resource;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class TicketsResource extends ResourceCollection
{
    /**
     * CaseResource constructor.
     * Enable wrap for this resource
     *
     * @param $resource
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param $request
     *
     * @return Collection
     */
    public function toArray($request): Collection
    {
        return $this->collection->map(function ($item, $key) {
            return [
                'id' => $item['id'],
                'subject' => $item['subject'],
                'description' => isset($item['description']) ? null : "",
                'project_id' => $item['project']['id'],
                'project_name' => $item['project']['name'],
                $this->mergeWhen($item['status'], [
                    'status_id' => $item['status']['id'],
                    'status_name' => $item['status']['name'],
                    'is_closed' => $item['status']['is_closed'],
                ]),
                $this->mergeWhen($item['author'], [
                    'author_id' => $item['author']['id'],
                    'author_name' => $item['author']['name'],
                ]),
            ];
        });
    }
}
