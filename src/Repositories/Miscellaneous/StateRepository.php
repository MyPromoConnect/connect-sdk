<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
use MyPromo\Connect\SDK\Exceptions\StateException;
use MyPromo\Connect\SDK\Helpers\StateOptions;
use MyPromo\Connect\SDK\Repositories\Repository;
use Psr\Cache\InvalidArgumentException;

class StateRepository extends Repository
{
    /**
     * Available options:
     *      from
     *      per_page
     *
     * You can use the @param array|StateOptions $options
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws StateException
     */
    public function all($options) {
        try {
            if ($options instanceof StateOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/states', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query' => $options,
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new StateException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new StateException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param $stateId
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws StateException
     */
    public function find($stateId) {
        try {
            $response = $this->client->guzzle()->get('/v1/states/' . $stateId, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new StateException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new StateException($ex->getMessage(), $ex->getCode());
        }
    }
}
