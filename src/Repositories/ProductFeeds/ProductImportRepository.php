<?php

namespace MyPromo\Connect\SDK\Repositories\ProductFeeds;

use Exception;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Exceptions\InvalidResponseException;
use MyPromo\Connect\SDK\Models\ProductFeeds\ImportConfirm;
use MyPromo\Connect\SDK\Helpers\ProductFeeds\ImportOptions;
use MyPromo\Connect\SDK\Models\ProductFeeds\Import;
use MyPromo\Connect\SDK\Repositories\Repository;

class ProductImportRepository extends Repository
{
    /**
     * @param $options
     * @return array
     * @throws ApiRequestException
     * @throws ApiResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function all($options): array
    {
        try {
            if ($options instanceof ProductImportOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/products_import', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query'   => $options,
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
     * @param $productImportId
     * @return array
     * @throws ApiRequestException
     * @throws ApiResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function find($productImportId): array
    {
        try {
            $response = $this->client->guzzle()->get('/v1/products_import/' . $productImportId, [
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
     * @param $productImportId
     * @return array
     * @throws ApiRequestException
     * @throws ApiResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function cancel($productImportId): array
    {
        try {
            $response = $this->client->guzzle()->patch('/v1/products_import/' . $productImportId . '/cancel', [
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
     * @param $productImportId
     * @return array
     * @throws ApiRequestException
     * @throws ApiResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($productImportId): array
    {
        try {
            $response = $this->client->guzzle()->delete('/v1/products_import/' . $productImportId, [
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
     * @param Import $productImport
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     * @throws InvalidResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function create(Import $productImport)
    {
        try {
            $response = $this->client->guzzle()->post('/v1/products_import', [
                'headers'            => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $productImport->toArray(),
            ]);
        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 201) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        $body = json_decode($response->getBody(), true);

        if (!empty($body) && isset($body['id'])) {
            $productImport->setId($body['id']);
        } else {
            throw new InvalidResponseException('Unable retrive required data from response.', 422);
        }

        return $body;
    }

    /**
     * @param $productImportId
     * @return array
     * @throws ApiRequestException
     * @throws ApiResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function errors($productImportId): array
    {
        try {
            $response = $this->client->guzzle()->get('/v1/products_import/' . $productImportId . '/errors', [
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
     * @param $productImportId
     * @return array
     * @throws ApiRequestException
     * @throws ApiResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function validate($productImportId): array
    {
        try {
            $response = $this->client->guzzle()->patch('/v1/products_import/' . $productImportId . '/validate', [
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
     * @param ProductImportConfirm $productImportConfirm
     * @param $productImportId
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function confirm(ProductImportConfirm $productImportConfirm, $productImportId)
    {
        try {
            $response = $this->client->guzzle()->patch('/v1/products_import/' . $productImportId . '/confirm', [
                'headers'            => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $productImportConfirm->toArray(),
            ]);
        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 200) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        $body = json_decode($response->getBody(), true);

        return $body;
    }
}
