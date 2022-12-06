<?php

namespace App\Service;

use App\Http\Contracts\ITicketRequest;
use App\Models\RequestData\TicketData;
use App\Models\ResponseFactory\IntegrationResponseFactory;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class TicketService
{
    private Http $client;
    private RedmineData $data;
    private IntegrationResponseFactory $response_factory;

    /**
     * @param Http $client
     * @param RedmineData $data
     * @param IntegrationResponseFactory $response_factory
     */
    public function __construct(Http $client, RedmineData $data, IntegrationResponseFactory $response_factory)
    {
        $this->client = $client;
        $this->data = $data;
        $this->response_factory = $response_factory;
    }

    public function saveIssue(ITicketRequest $request)
    {
        $curl_url = $this->data->getPostUrl();

        $post_fields = TicketData::getTicket($request);

        $response = $this->curlSendData($curl_url, $post_fields);

        return $this->response_factory->processingResponse($response);
    }

    /**
     * @param string $url
     * @param array $post_fields
     *
     * @return Response
     */
    protected function curlSendData(string $url, array $post_fields = []): Response
    {
        return $this->client::withHeaders([
            'X-Redmine-API-Key' => $this->data->getKey(),
            'Content-Type' => 'application/json',
        ])->post($url, $post_fields);
    }
}
