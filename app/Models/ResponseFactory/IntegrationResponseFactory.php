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
        switch ($response->status()) {
            case "201":
                return $this->createSuccessMessage(ResponseMessages::PUBLISHED);
            case "200":
                return $this->createSuccessObj($response);
            default:
                return $this->createErrorObj($response);
        }
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

    private function createSuccessObj(Response $response): ISuccess
    {
        $this->log::info($response->status());
        $this->log::info($response->reason());

        $result = $this->app->make(Success::class);
        $result->code = $response->status();
        $json = json_decode($response->body(), true);
        $json = $json['issues'];

        $result->obj = $json;
        return $result;
    }

    public function createSuccessMessage($message): ISuccess
    {
        $result = $this->app->make(Success::class);

        $result->message = $message;

        return $result;
    }
}
