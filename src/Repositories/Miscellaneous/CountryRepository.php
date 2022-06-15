<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Helpers\Miscellaneous\CountryOptions;
use MyPromo\Connect\SDK\Repositories\Repository;

class CountryRepository extends Repository
{
    /**
     * @param CountryOptions $options
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException|GuzzleException
     */
    public function all(CountryOptions $options)
    {
        try {
            if ($options instanceof CountryOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/countries', [
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
     * @param int $countryId
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException|GuzzleException
     */
    public function find(int $countryId)
    {
        try {
            $response = $this->client->guzzle()->get('/v1/countries/' . $countryId, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
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
