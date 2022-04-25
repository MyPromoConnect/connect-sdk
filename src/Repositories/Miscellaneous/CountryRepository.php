<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use MyPromo\Connect\SDK\Exceptions\CountryException;
use MyPromo\Connect\SDK\Helpers\CountryOptions;
use MyPromo\Connect\SDK\Helpers\GeneralHelper;
use MyPromo\Connect\SDK\Repositories\Repository;
use Psr\Cache\InvalidArgumentException;

class CountryRepository extends Repository
{
    /**
     * Available options:
     *      from
     *      per_page
     *
     * You can use the @param array|CountryOptions $options
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws CountryException|GuzzleException
     */
    public function all($options) {
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
                'query' => $options,
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new CountryException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (GuzzleException $ex) {
            throw new CountryException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new CountryException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param $countryId
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws CountryException|GuzzleException
     */
    public function find($countryId) {
        try {
            $response = $this->client->guzzle()->get('/v1/countries/' . $countryId, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new CountryException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (GuzzleException $ex) {
            throw new CountryException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new CountryException($ex->getMessage(), $ex->getCode());
        }
    }
}
