<?php

namespace MyPromo\Connect\SDK\Repositories\Jobs;

use Exception;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Exceptions\InvalidResponseException;
use MyPromo\Connect\SDK\Models\Jobs\ConnectorJob;
use MyPromo\Connect\SDK\Repositories\Repository;

class ConnectorJobRepository extends Repository
{
    /**
     * @param ConnectorJob $connectorJob
     *
     * @return mixed
     */
    public function create(ConnectorJob $connectorJob)
    {
        try {
            $response = $this->client->guzzle()->post('/v1/client/connectors/job', [
                'headers'            => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $connectorJob->toArray(),
            ]);

        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 201) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        $body = json_decode($response->getBody(), true);

        if (!empty($body) && isset($body['id'])) {
            $connectorJob->setId($body['id']);
        } else {
            throw new InvalidResponseException('Unable retrive required data from response.', 422);
        }

        return $body;
    }
}
