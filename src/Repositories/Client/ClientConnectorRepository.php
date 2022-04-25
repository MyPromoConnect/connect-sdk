<?php

namespace MyPromo\Connect\SDK\Repositories\Client;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ClientConnectorException;
use MyPromo\Connect\SDK\Helpers\GeneralHelper;
use MyPromo\Connect\SDK\Models\ClientConnector;
use MyPromo\Connect\SDK\Repositories\Repository;
use Psr\Cache\InvalidArgumentException;

class ClientConnectorRepository extends Repository
{
    /**
     * Update client connectors
     *
     * @param ClientConnector $clientConnector
     * @return mixed
     *
     * @throws ClientConnectorException
     * @throws InvalidArgumentException
     */
    public function update(ClientConnector $clientConnector)
    {
        try {
            $response = $this->client->guzzle()->patch('/v1/client/connectors', [
                'headers'           => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $clientConnector->toArray(),
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ClientConnectorException($response->getBody(), $response->getStatusCode());
            }

            $body = json_decode($response->getBody(), true);

        } catch (GuzzleException $ex) {
            throw new ClientConnectorException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new ClientConnectorException($ex->getMessage(), $ex->getCode());
        }

        return $body;
    }
}
