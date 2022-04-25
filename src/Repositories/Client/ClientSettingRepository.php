<?php

namespace MyPromo\Connect\SDK\Repositories\Client;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ClientGeneralException;
use MyPromo\Connect\SDK\Helpers\GeneralHelper;
use MyPromo\Connect\SDK\Models\ClientSettingMerchant;
use MyPromo\Connect\SDK\Repositories\Repository;
use Psr\Cache\InvalidArgumentException;

class ClientSettingRepository extends Repository
{
    /**
     * Get a list of client settings
     *
     * @throws InvalidArgumentException
     * @throws ClientGeneralException
     *
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

            if ($response->getStatusCode() !== 200) {
                throw new ClientGeneralException($response->getBody(), $response->getStatusCode());
            }

        } catch (GuzzleException $ex) {
            throw new ClientGeneralException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new ClientGeneralException($ex->getMessage(), $ex->getCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * Update client settings
     *
     * @param ClientSettingMerchant $clientSettings
     *
     * @return mixed
     *
     * @throws InvalidArgumentException
     * @throws ClientGeneralException
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

            if ($response->getStatusCode() !== 200) {
                throw new ClientGeneralException($response->getBody(), $response->getStatusCode());
            }

            $body = json_decode($response->getBody(), true);

        } catch (GuzzleException $ex) {
            throw new ClientGeneralException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new ClientGeneralException($ex->getMessage(), $ex->getCode());
        }

        return $body;
    }
}
