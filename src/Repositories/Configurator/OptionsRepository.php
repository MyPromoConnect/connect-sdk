<?php

namespace MyPromo\Connect\SDK\Repositories\Configurator;

use Exception;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Repositories\Repository;
use MyPromo\Connect\SDK\Helpers\Configurator\OptionsOptions;

class OptionsRepository extends Repository
{

    /**
     * @param OptionsOptions $options
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function all(OptionsOptions $options)
    {
        if ($options instanceof OptionsOptions) {
            $options = $options->toArray();
        }

        try {
            $response = $this->client->guzzle()->get('/v1/products_configurator/options', [
                'headers' => [
                    'Accept'       => 'application/json',
                    'Content-Type' => 'application/json',
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


}
