<?php

namespace MyPromo\Connect\SDK\Repositories\Products;

use Exception;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Helpers\InventoryOptionsFulfiller;
use MyPromo\Connect\SDK\Helpers\InventoryOptionsMerchant;
use MyPromo\Connect\SDK\Helpers\PriceOptionsFulfiller;
use MyPromo\Connect\SDK\Helpers\PriceOptionsMerchant;
use MyPromo\Connect\SDK\Helpers\ProductOptions;
use MyPromo\Connect\SDK\Helpers\ProductVariantOptions;
use MyPromo\Connect\SDK\Helpers\SeoOptions;
use MyPromo\Connect\SDK\Repositories\Repository;

class ProductRepository extends Repository
{
    /**
     * Available options:
     *      from
     *      per_page
     *      shipping_from
     *      search
     *      available
     *      sku
     *      lang
     *      currency
     *      test_product
     *
     * You can use the @param array|ProductOptions $options
     *
     * @return array
     */
    public function all($options) {
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
                'query' => $options,
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
     * @param $productId
     *
     * @return array
     */
    public function find($productId) {
        try {
            $response = $this->client->guzzle()->get('/v1/products/' . $productId, [
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
     * Available options:
     *      from
     *      per_page
     *      sku
     *      sku_fulfiller (For Fulfiller)
     *      shipping_from (For Merchant)
     *
     * You can use the @param array|InventoryOptionsMerchant $options
     *
     * @return array
     */
    public function getInventory($options) {
        try {
            if (empty($options->getSkuFulfiller())) {
                if ($options instanceof InventoryOptionsMerchant) {
                    $options = $options->toArray();
                }
            } else {
                if ($options instanceof InventoryOptionsFulfiller) {
                    $options = $options->toArray();
                }
            }

            $response = $this->client->guzzle()->get('/v1/inventory', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query' => $options
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
     *
     * @return array
     */
    public function putInventory($productInventory) {
        try {
            $response = $this->client->guzzle()->patch('/v1/inventory', [
                'headers' => [
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
     * Available options:
     *      from
     *      per_page
     *      sku
     *      shipping_from
     *
     * You can use the @param array|PriceOptionsMerchant|PriceOptionsFulfiller $options
     *
     * @return array
     */
    public function getPrices($options) {
        try {
            if ($options instanceof PriceOptionsMerchant || $options instanceof PriceOptionsFulfiller) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/prices', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query' => $options
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
     *
     * @return array
     */
    public function putPrices($productPriceUpdate) {
        try {
            $response = $this->client->guzzle()->patch('/v1/prices', [
                'headers' => [
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
     * Available options:
     *      from
     *      per_page
     *      sku
     *
     * You can use the @param array|SeoOptions $options
     *
     * @return array
     */
    public function getSeo($options) {
        try {
            if ($options instanceof SeoOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/seo', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query' => $options
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
     *
     * @return array
     */
    public function putSeo($productSeoUpdate) {
        try {
            $response = $this->client->guzzle()->patch('/v1/seo', [
                'headers' => [
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
     *
     * @return array
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
                'query' => $productVariantOptions->toArray(),
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
     * @param $id
     *
     * @return array
     */
    public function getVariant($id)
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
