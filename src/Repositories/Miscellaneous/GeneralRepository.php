<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Repositories\Repository;

class GeneralRepository extends Repository
{
    /**
     * Check api status
     *
     * @return array
     */
    public function apiStatus(): array
    {
        try {
            $response = $this->client->guzzle()->get('/v1/status', [
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

    /**
     * Download a file
     *
     * @param $shortUrlIdentifier
     * @return array
     */
    public function downloadFile($shortUrlIdentifier): array
    {
        // TODO: create save method similar to $designRepository->savePreview($design->getId(), 'preview.pdf');
        // alternativly offer savetodisk option and filename in the method
        // eg. downloadFile($url, true, '/path/to/file.ext')

        try {
            $response = $this->client->guzzle()->get('/v1/' . $shortUrlIdentifier, [
                'headers' => [
                    'Accept'        => 'application/json',
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
}
