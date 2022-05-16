<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Helpers\Miscellaneous\LocaleOptions;
use MyPromo\Connect\SDK\Repositories\Repository;

class LocaleRepository extends Repository
{
    /**
     * @param LocaleOptions $options
     * @return array
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function all(LocaleOptions $options): array
    {
        try {
            if ($options instanceof LocaleOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/locales', [
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
     * @param int $localeId
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function find(int $localeId)
    {
        try {
            $response = $this->client->guzzle()->get('/v1/locales/' . $localeId, [
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
