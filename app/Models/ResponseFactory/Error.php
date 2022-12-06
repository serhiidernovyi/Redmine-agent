<?php

namespace App\Models\ResponseFactory;


use App\Http\Contracts\IError;

class Error implements IError
{
    public string $message;
    public string $code;

    public function getMessage()
    {
        return $this->message;
    }

    public function getCode()
    {
        return $this->code;
    }
}
