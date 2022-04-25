<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use MyPromo\Connect\SDK\Exceptions\LocaleException;
use MyPromo\Connect\SDK\Helpers\GeneralHelper;
use MyPromo\Connect\SDK\Helpers\LocaleOptions;
use MyPromo\Connect\SDK\Repositories\Repository;
use Psr\Cache\InvalidArgumentException;

class LocaleRepository extends Repository
{
    /**
     * Available options:
     *      from
     *      per_page
     *      pagination
     *
     * You can use the @param array|LocaleOptions $options
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws LocaleException
     */
    public function all($options): array
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
                'query' => $options,
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new LocaleException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (GuzzleException $ex) {
            throw new LocaleException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new LocaleException($ex->getMessage(), $ex->getCode());
        }
    }
}
