<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
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
     * @throws GeneralException
     */
    public function apiStatus(): array
    {
        try {
            $response = $this->client->guzzle()->get('/v1/status', [
                'headers' => [
                    'Accept' => 'application/json',
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
     * Download a file
     *
     * @param $shortUrlIdentifier
     * @return array
     * @throws GeneralException
     * @throws InvalidArgumentException
     */
    public function downloadFile($shortUrlIdentifier): array
    {
        // TODO: create save method similar to $designRepository->savePreview($design->getId(), 'preview.pdf');
        // alternativly offer savetodisk option and filename in the method
        // eg. downloadFile($url, true, '/path/to/file.ext')

        try {
            $response = $this->client->guzzle()->get('/v1/' . $shortUrlIdentifier, [
                'headers' => [
                    'Accept' => 'application/json',
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
