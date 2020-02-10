<?php

namespace MyPromo\Connect\SDK\Repositories\Designs;

use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ClientException;
use MyPromo\Connect\SDK\Exceptions\DesignException;
use MyPromo\Connect\SDK\Exceptions\MissingCredentialsException;
use MyPromo\Connect\SDK\Models\Design;
use MyPromo\Connect\SDK\Repositories\Repository;
use Psr\Cache\InvalidArgumentException;

/**
 * Class DesignRepository
 * @package MyPromo\Connect\SDK\Repositories\Orders
 */
class DesignRepository extends Repository
{
    /**
     * @param Design $design
     *
     * @return mixed
     *
     * @throws DesignException
     * @throws ClientException
     * @throws MissingCredentialsException
     * @throws InvalidArgumentException
     */
    public function create($design)
    {
        $response = $this->client->guzzle()->post('/v1/designs', [
            'headers'            => [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
            RequestOptions::JSON => $design->toArray(),
        ]);

        if ($response->getStatusCode() !== 201) {
            throw new DesignException($response->getBody(), $response->getStatusCode());
        }

        $body = json_decode($response->getBody(), true);
        $design->setId($body['id']);

        return $body;
    }

    /**
     * @param int $designId
     *
     * @return mixed
     *
     * @throws ClientException
     * @throws DesignException
     * @throws InvalidArgumentException
     * @throws MissingCredentialsException
     */
    public function submit($designId)
    {
        $response = $this->client->guzzle()->post('/v1/designs/' . $designId . '/submit', [
            'headers' => [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new DesignException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param int         $designId
     * @param null|string $targetFile
     *
     * @return string
     * @throws ClientException
     * @throws DesignException
     * @throws InvalidArgumentException
     * @throws MissingCredentialsException
     */
    public function preview($designId, $targetFile = null)
    {
        $response = $this->client->guzzle()->get('/v1/designs/' . $designId . '/preview', [
            'headers' => [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new DesignException($response->getBody(), $response->getStatusCode());
        } elseif (
            strtolower($response->getHeader('Content-Type')[0]) !== 'pdf'
            && strtolower($response->getHeader('Content-Type')[0]) !== 'application/pdf'
        ) {
            throw new DesignException(
                "Not supported content-type '{$response->getHeader('Content-Type')[0]}'."
            );
        }

        if ($targetFile) {
            $previewFile = fopen($targetFile, 'w');
            fwrite($previewFile, $response->getbody());
            fclose($previewFile);
        }

        return $response;
    }
}
