<?php

namespace MyPromo\Connect\SDK\Repositories\Designs;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\DesignException;
use MyPromo\Connect\SDK\Helpers\GeneralHelper;
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
     * @throws InvalidArgumentException
     * @throws DesignException
     */
    public function create($design)
    {
        try {
            $response = $this->client->guzzle()->post('/v1/designs', [
                'headers'           => [
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

        } catch (GuzzleException $ex) {
            throw new DesignException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new DesignException($ex->getMessage(), $ex->getCode());
        }

        return $body;
    }

    /**
     * @param $designId
     *
     * @return mixed
     * @throws DesignException
     * @throws InvalidArgumentException
     */
    public function getDesign($designId)
    {
        try {
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

        } catch (GuzzleException $ex) {
            throw new DesignException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new DesignException($ex->getMessage(), $ex->getCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param int $designId
     *
     * @return mixed
     *
     * @throws DesignException
     * @throws InvalidArgumentException
     */
    public function submit($designId)
    {
        try {
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
        } catch (GuzzleException $ex) {
            throw new DesignException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new DesignException($ex->getMessage(), $ex->getCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param int $designId
     *
     * @return ResponseInterface
     * @throws DesignException
     * @throws InvalidArgumentException
     */
    public function getPreviewPDF($designId)
    {
        try {
            $getDesignResponse = $this->getDesign($designId);

            $previewUrl = $getDesignResponse['preview_url'] ?? null;

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

        } catch (GuzzleException $ex) {
            throw new DesignException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new DesignException($ex->getMessage(), $ex->getCode());
        }

        return $response;
    }

    /**
     * @param int    $designId
     * @param string $targetFile
     *
     * @return bool
     * @throws DesignException
     * @throws InvalidArgumentException
     */
    public function savePreview($designId, $targetFile)
    {
        try {
            $response = $this->getPreviewPDF($designId);

            $previewFile = fopen($targetFile, 'w');
            if ($previewFile === false) {
                throw new DesignException("File '{$targetFile}' could not be created.");
            }

            if (fwrite($previewFile, $response->getbody()) === false){
                throw new DesignException("File '{$targetFile}' is not writable.");
            }

            $file = fclose($previewFile);

        } catch (GuzzleException $ex) {
            throw new DesignException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new DesignException($ex->getMessage(), $ex->getCode());
        }

        return $file;
    }

    /**
     * @param Design $design
     *
     * @return mixed
     *
     * @throws DesignException
     * @throws InvalidArgumentException
     */
    public function createEditorUserHash($design)
    {
        try {
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

        } catch (GuzzleException $ex) {
            throw new DesignException(GeneralHelper::GUZZLE_EXCEPTION_MESSAGE, $ex->getCode());
        } catch (Exception $ex) {
            throw new DesignException($ex->getMessage(), $ex->getCode());
        }

        return $body;
    }

}
