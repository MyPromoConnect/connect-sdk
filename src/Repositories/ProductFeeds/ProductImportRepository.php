<?php

namespace MyPromo\Connect\SDK\Repositories\ProductFeeds;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ProductExportException;
use MyPromo\Connect\SDK\Exceptions\ProductImportException;
use MyPromo\Connect\SDK\Helpers\ConfirmProductImportOptions;
use MyPromo\Connect\SDK\Helpers\ProductExportOptions;
use MyPromo\Connect\SDK\Helpers\ProductImportOptions;
use MyPromo\Connect\SDK\Helpers\ProductOptions;
use MyPromo\Connect\SDK\Models\ProductExport;
use MyPromo\Connect\SDK\Models\ProductImport;
use MyPromo\Connect\SDK\Repositories\Repository;
use Psr\Cache\InvalidArgumentException;

class ProductImportRepository extends Repository
{
    /**
     * Available options:
     *      page
     *      perPage
     *      pagination
     *      created_from
     *      created_to
     *
     * You can use the @param array|ProductImportOptions $options
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws GuzzleException|ProductImportException
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
                'query' => $options,
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ProductImportException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductImportException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Find product import by using product import id
     *
     * @param $productImportId
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ProductImportException|GuzzleException
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

            if ($response->getStatusCode() !== 200) {
                throw new ProductImportException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductImportException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Cancel product import by using product import id
     *
     * @param $productImportId
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ProductImportException|GuzzleException
     */
    public function cancelImport($productImportId): array
    {
        try {
            $response = $this->client->guzzle()->patch('/v1/products_import/' . $productImportId . '/cancel', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ProductImportException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductImportException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Delete product import by using product import id
     *
     * @param $productImportId
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ProductImportException|GuzzleException
     */
    public function deleteImport($productImportId): array
    {
        try {
            $response = $this->client->guzzle()->delete('/v1/products_import/' . $productImportId, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ProductImportException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductImportException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param ProductImport $productImport
     *
     * @return mixed
     *
     * @throws InvalidArgumentException|GuzzleException
     * @throws ProductImportException
     */
    public function requestImport(ProductImport $productImport)
    {
        try {
            $response = $this->client->guzzle()->post('/v1/products_import', [
                'headers'           => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $productImport->toArray(),
            ]);

            if ($response->getStatusCode() !== 201) {
                throw new ProductImportException($response->getBody(), $response->getStatusCode());
            }

            $body = json_decode($response->getBody(), true);
            $productImport->setId($body['id']);

        } catch (Exception $ex) {
            throw new ProductImportException($ex->getMessage(), $ex->getCode());
        }

        return $body;
    }

    /**
     * Import errors product import id
     *
     * @param $productImportId
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ProductImportException|GuzzleException
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

            if ($response->getStatusCode() !== 200) {
                throw new ProductImportException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductImportException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Validate  product import by id
     *
     * @param $productImportId
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ProductImportException|GuzzleException
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

            if ($response->getStatusCode() !== 200) {
                throw new ProductImportException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductImportException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param ConfirmProductImportOptions $confirmProductImportOptions
     * @param $productImportId
     * @return mixed
     *
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws ProductImportException
     */
    public function confirm(ConfirmProductImportOptions $confirmProductImportOptions, $productImportId)
    {
        try {
            $response = $this->client->guzzle()->patch('/v1/products_import/' . $productImportId . '/confirm', [
                'headers'           => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $confirmProductImportOptions->toArray(),
            ]);

            if ($response->getStatusCode() !== 201) {
                throw new ProductImportException($response->getBody(), $response->getStatusCode());
            }

            $body = json_decode($response->getBody(), true);

        } catch (Exception $ex) {
            throw new ProductImportException($ex->getMessage(), $ex->getCode());
        }

        return $body;
    }
}
