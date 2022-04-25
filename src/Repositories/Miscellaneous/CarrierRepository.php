<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use MyPromo\Connect\SDK\Exceptions\CarrierException;
use MyPromo\Connect\SDK\Helpers\CarrierOptions;
use MyPromo\Connect\SDK\Helpers\GeneralHelper;
use MyPromo\Connect\SDK\Repositories\Repository;
use Psr\Cache\InvalidArgumentException;

class CarrierRepository extends Repository
{
    /**
     * Available options:
     *      from
     *      per_page
     *
     * You can use the @param array|CarrierOptions $options
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws CarrierException
     */
    public function all($options) {
        try {
            if ($options instanceof CarrierOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/carriers', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query' => $options,
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new CarrierException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (GuzzleException $ex) {
            throw new CarrierException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new CarrierException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param $carrierId
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws CarrierException
     */
    public function find($carrierId) {
        try {
            $response = $this->client->guzzle()->get('/v1/carriers/' . $carrierId, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new CarrierException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (GuzzleException $ex) {
            throw new CarrierException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new CarrierException($ex->getMessage(), $ex->getCode());
        }
    }
}
