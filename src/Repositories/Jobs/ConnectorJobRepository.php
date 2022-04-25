<?php

namespace MyPromo\Connect\SDK\Repositories\Jobs;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ConnectorJobException;
use MyPromo\Connect\SDK\Helpers\GeneralHelper;
use MyPromo\Connect\SDK\Models\ConnectorJob;
use MyPromo\Connect\SDK\Repositories\Repository;
use Psr\Cache\InvalidArgumentException;

class ConnectorJobRepository extends Repository
{
    /**
     * @param ConnectorJob $connectorJob
     *
     * @return mixed
     *
     * @throws InvalidArgumentException
     * @throws ConnectorJobException
     */
    public function createJob(ConnectorJob $connectorJob)
    {
        try {
            $response = $this->client->guzzle()->post('/v1/client/connectors/job', [
                'headers'           => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $connectorJob->toArray(),
            ]);

            if ($response->getStatusCode() !== 201) {
                throw new ConnectorJobException($response->getBody(), $response->getStatusCode());
            }

            $body = json_decode($response->getBody(), true);
            $connectorJob->setId($body['id']);

        } catch (GuzzleException $ex) {
            throw new ConnectorJobException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new ConnectorJobException($ex->getMessage(), $ex->getCode());
        }

        return $body;
    }
}
