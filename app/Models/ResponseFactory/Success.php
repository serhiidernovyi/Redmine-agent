<?php

namespace App\Models\ResponseFactory;

use App\Http\Contracts\ISuccess;

class Success implements ISuccess
{
    public string $message;
    public array $obj;

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getObj(): array
    {
        return $this->obj;
    }
}
