<?php

namespace MyPromo\Connect\SDK\Repositories\Client;

use Exception;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Helpers\ClientConnectorOptions;
use MyPromo\Connect\SDK\Helpers\OrderOptions;
use MyPromo\Connect\SDK\Models\ClientConnector;
use MyPromo\Connect\SDK\Repositories\Repository;

class ClientConnectorRepository extends Repository
{

    /**
     * Get all Connectors assigned to a client
     *
     * @return array
     * @see OrderOptions as its helper
     *
     */
    public function all($options)
    {
        if ($options instanceof ClientConnectorOptions) {
            $options = $options->toArray();
        }

        dd($options);

        try {
            $response = $this->client->guzzle()->get('/v1/client/connectors', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query'   => $options,
            ]);

        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 200) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }


    /**
     * Update client connectors
     *
     * @param ClientConnector $clientConnector
     * @return mixed
     */
    public function update(ClientConnector $clientConnector)
    {
        try {
            $response = $this->client->guzzle()->patch('/v1/client/connectors', [
                'headers'            => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $clientConnector->toArray(),
            ]);
        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 200) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }
}
