<?php

namespace MyPromo\Connect\SDK\Repositories\Designs;

use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ClientException;
use MyPromo\Connect\SDK\Exceptions\DesignException;
use MyPromo\Connect\SDK\Exceptions\MissingCredentialsException;
use MyPromo\Connect\SDK\Models\Design;
use MyPromo\Connect\SDK\Repositories\Repository;
use Psr\Cache\InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;

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
     * @param $designId
     *
     * @return mixed
     * @throws ClientException
     * @throws DesignException
     * @throws InvalidArgumentException
     * @throws MissingCredentialsException
     */
    public function getDesign($designId)
    {
        $response = $this->client->guzzle()->get('/v1/designs/' . $designId, [
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
     * @param int $designId
     *
     * @return ResponseInterface
     * @throws ClientException
     * @throws DesignException
     * @throws InvalidArgumentException
     * @throws MissingCredentialsException
     */
    public function getPreviewPDF($designId)
    {
        $getDesignResponse = $this->getDesign($designId);

        $previewUrl = isset($getDesignResponse['preview_url']) ? $getDesignResponse['preview_url'] : null;

        if ($previewUrl === null){
            throw new DesignException("No preview url exists.");
        }

        $response = $this->client->guzzle()->get($previewUrl, [
            'headers' => [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
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

        return $response;
    }

    /**
     * @param int    $designId
     * @param string $targetFile
     *
     * @return bool
     * @throws ClientException
     * @throws DesignException
     * @throws InvalidArgumentException
     * @throws MissingCredentialsException
     */
    public function savePreview($designId, $targetFile)
    {
        $response = $this->getPreviewPDF($designId);

        $previewFile = fopen($targetFile, 'w');
        if ($previewFile === false) {
            throw new DesignException("File '{$targetFile}' could not be created.");
        }


        if (fwrite($previewFile, $response->getbody()) === false){
            throw new DesignException("File '{$targetFile}' is not writable.");
        }

        return fclose($previewFile);
    }
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
    public function createEditorUserHash($design)
    {
        $response = $this->client->guzzle()->post('/v1/editor_user', [
            'headers'            => [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
        ]);

        if ($response->getStatusCode() !== 201) {
            throw new DesignException($response->getBody(), $response->getStatusCode());
        }

        $body = json_decode($response->getBody(), true);
        $design->setEditorUserHash($body['editor_user_hash']);

        return $body;
    }

}
