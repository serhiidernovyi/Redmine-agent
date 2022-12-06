<?php

namespace App\Models\ResponseFactory;

use App\Http\Contracts\ISuccess;

class Success implements ISuccess
{
    public string $message;

    public function getMessage()
    {
        return $this->message;
    }
}
