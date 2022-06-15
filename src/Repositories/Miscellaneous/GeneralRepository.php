<?php

namespace MyPromo\Connect\SDK\Repositories\Miscellaneous;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Exceptions\InputValidationException;
use MyPromo\Connect\SDK\Exceptions\SdkException;
use MyPromo\Connect\SDK\Repositories\Repository;

class GeneralRepository extends Repository
{
    /**
     * @return array
     * @throws ApiRequestException
     * @throws ApiResponseException|GuzzleException
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
     * @param string $url
     * @param string $targetFile
     * @return bool
     * @throws ApiRequestException
     * @throws ApiResponseException
     * @throws InputValidationException
     * @throws SdkException
     */
    public function downloadFile(string $url, string $targetFile): bool
    {
        $shortUrlIdentifier = basename($url);

        if (empty($shortUrlIdentifier)) {
            throw new InputValidationException('Could not determine the short url identifier');
        }

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

        $localFile = fopen($targetFile, 'w');

        if ($localFile === false) {
            throw new SdkException("File '{$targetFile}' could not be created.");
        }

        if (fwrite($localFile, $response->getbody()) === false) {
            throw new SdkException("File '{$targetFile}' is not writable.");
        }

        return fclose($localFile);
    }
}
