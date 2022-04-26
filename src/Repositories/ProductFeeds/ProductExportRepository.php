<?php

namespace MyPromo\Connect\SDK\Repositories\ProductFeeds;

use Exception;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Exceptions\InvalidResponseException;
use MyPromo\Connect\SDK\Exceptions\ProductExportException;
use MyPromo\Connect\SDK\Helpers\ProductExportOptions;
use MyPromo\Connect\SDK\Helpers\ProductOptions;
use MyPromo\Connect\SDK\Models\ProductExport;
use MyPromo\Connect\SDK\Repositories\Repository;
use PharIo\Manifest\ElementCollectionException;
use Psr\Cache\InvalidArgumentException;

class ProductExportRepository extends Repository
{
    /**
     * Available options:
     *      page
     *      perPage
     *      pagination
     *      created_from
     *      created_to
     *
     * You can use the @param  array|ProductOptions  $options
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ApiRequestException
     */
    public function all($options): array
    {
        try {
            if ($options instanceof ProductExportOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/products_export', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query' => $options,
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ApiResponseException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Find product export by using product export id
     *
     * @param $productExportId
     *
     * @return array
     * @throws InvalidArgumentException
     */
    public function find($productExportId): array
    {
        try {
            $response = $this->client->guzzle()->get('/v1/products_export/' . $productExportId, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ApiResponseException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Cancel product export by using product export id
     *
     * @param $productExportId
     *
     * @return array
     * @throws InvalidArgumentException
     */
    public function cancelExport($productExportId): array
    {
        try {
            $response = $this->client->guzzle()->patch('/v1/products_export/' . $productExportId . '/cancel', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ApiResponseException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Delete product export by using product export id
     *
     * @param $productExportId
     *
     * @return array
     * @throws InvalidArgumentException
     */
    public function deleteExport($productExportId): array
    {
        try {
            $response = $this->client->guzzle()->delete('/v1/products_export/' . $productExportId, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ApiResponseException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param ProductExport $productExport
     *
     * @return mixed
     */
    public function requestExport(ProductExport $productExport)
    {
        try {
            $response = $this->client->guzzle()->post('/v1/products_export', [
                'headers'           => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $productExport->toArray(),
            ]);

        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 201) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        $body = json_decode($response->getBody(), true);

        if (!empty($body) && isset($body['asdfgid'])) {
            $productExport->setId($body['asdfgid']);
        } else {
            throw new InvalidResponseException('Unable retrive required data from response.', 422);
        }

        return $body;
    }
}
