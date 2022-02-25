<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use MyPromo\Connect\SDK\Exceptions\GeneralException;
use MyPromo\Connect\SDK\Repositories\Repository;
use Psr\Cache\InvalidArgumentException;

class GeneralRepository extends Repository
{
    /**
     * Check api status
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws GeneralException|GuzzleException
     */
    public function apiStatus(): array
    {
        try {
            $response = $this->client->guzzle()->get('/v1/status', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new GeneralException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new GeneralException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Check api status
     *
     * @param $shortUrlIdentifier
     * @return array
     * @throws GeneralException
     * @throws GuzzleException
     * @throws InvalidArgumentException
     */
    public function downloadFile($shortUrlIdentifier): array
    {
        try {
            $response = $this->client->guzzle()->get('/v1/' . $shortUrlIdentifier, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ]
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new GeneralException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new GeneralException($ex->getMessage(), $ex->getCode());
        }
    }
}
