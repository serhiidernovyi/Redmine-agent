<?php

namespace App\Models\ResponseFactory;

use App\Http\Contracts\IError;
use App\Http\Contracts\ISuccess;
use Illuminate\Foundation\Application;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

class IntegrationResponseFactory
{
    private Application $app;
    private Log $log;

    public function __construct(Application $app, Log $log)
    {
        $this->app = $app;
        $this->log = $log;
    }

    public function processingResponse(Response $response): ISuccess|IError
    {
        if (! $response->successful()) {
            return $this->createErrorObj($response);
        }

        return $this->createSuccessMessage(ResponseMessages::PUBLISHED);
    }


    private function createErrorObj(Response $response): IError
    {
        $this->log::error($response->status());
        $this->log::error($response->reason());

        $result = $this->app->make(Error::class);
        $result->code = $response->status();
        $result->message = $response->reason();

        return $result;
    }

    public function createSuccessMessage($message): ISuccess
    {
        $result = $this->app->make(Success::class);

        $result->message = $message;

        return $result;
    }
}
