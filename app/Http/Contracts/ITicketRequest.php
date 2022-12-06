<?php

namespace App\Http\Contracts;

interface ITicketRequest
{
    public function getProjectId(): int;
    public function getTrackerId(): int|null;
    public function getStatusId(): int|null;
    public function getPriorityId(): int;
    public function getSubject(): string;
    public function getDescription(): string;
}
