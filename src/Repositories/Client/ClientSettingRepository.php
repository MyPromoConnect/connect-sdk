<?php

namespace MyPromo\Connect\SDK\Repositories\Client;

use Exception;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Models\ClientSettingMerchant;
use MyPromo\Connect\SDK\Repositories\Repository;

class ClientSettingRepository extends Repository
{
    /**
     * Get a list of client settings
     */
    public function getSettings()
    {
        try {
            $response = $this->client->guzzle()->get('/v1/client/settings', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ]
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
     * Update client settings
     *
     * @param ClientSettingMerchant $clientSettings
     *
     * @return mixed
     */
    public function update(ClientSettingMerchant $clientSettings)
    {
        try {
            $response = $this->client->guzzle()->patch('/v1/client/settings', [
                'headers'           => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $clientSettings->toArray(),
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
