<?php

namespace MyPromo\Connect\SDK\Repositories\Products;

use Exception;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Helpers\Products\InventoryOptionsFulfiller;
use MyPromo\Connect\SDK\Helpers\Products\InventoryOptionsMerchant;
use MyPromo\Connect\SDK\Helpers\Products\PriceOptionsFulfiller;
use MyPromo\Connect\SDK\Helpers\Products\PriceOptionsMerchant;
use MyPromo\Connect\SDK\Helpers\Products\ProductOptions;
use MyPromo\Connect\SDK\Helpers\Products\ProductVariantOptions;
use MyPromo\Connect\SDK\Helpers\Products\SeoOptions;
use MyPromo\Connect\SDK\Repositories\Repository;

class ProductRepository extends Repository
{
    /**
     * @param ProductOptions $options
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function all(ProductOptions $options)
    {
        try {
            if ($options instanceof ProductOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/products', [
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
     * @param int $productId
     * @param ProductOptions $options
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function find(int $productId, ProductOptions $options)
    {
        try {
            if ($options instanceof ProductOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/products/' . $productId, [
                'headers' => [
                    'Accept'        => 'application/json',
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
     * @param InventoryOptionsMerchant | InventoryOptionsFulfiller $options
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function getInventory($options)
    {
        try {

            if ($options instanceof InventoryOptionsMerchant) {
                $options = $options->toArray();
            }

            if ($options instanceof InventoryOptionsFulfiller) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/inventory', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query'   => $options
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
     * @param $productInventory
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function putInventory($productInventory)
    {
        try {
            $response = $this->client->guzzle()->patch('/v1/inventory', [
                'headers'            => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $productInventory->toArray(),
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
     * @param $options
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function getPrices($options)
    {
        try {

            if ($options instanceof PriceOptionsMerchant) {
                $options = $options->toArray();
            }

            if ($options instanceof PriceOptionsFulfiller) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/prices', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query'   => $options
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
     * @param $productPriceUpdate
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function putPrices($productPriceUpdate)
    {
        try {
            $response = $this->client->guzzle()->patch('/v1/prices', [
                'headers'            => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $productPriceUpdate->toArray(),
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
     * @param SeoOptions $options
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function getSeo(SeoOptions $options)
    {
        try {
            if ($options instanceof SeoOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/seo', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query'   => $options
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
     * @param $productSeoUpdate
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function putSeo($productSeoUpdate)
    {
        try {
            $response = $this->client->guzzle()->patch('/v1/seo', [
                'headers'            => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $productSeoUpdate->toArray(),
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
     * @param ProductVariantOptions $productVariantOptions
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function getVariants(ProductVariantOptions $productVariantOptions)
    {
        try {
            $response = $this->client->guzzle()->get('/v1/variants', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query'   => $productVariantOptions->toArray(),
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
     * @param int $id
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function getVariant(int $id)
    {
        try {
            $response = $this->client->guzzle()->get('/v1/variants/' . $id, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
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
