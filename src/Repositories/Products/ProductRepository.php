<?php
/**
 * Created by PhpStorm.
 * User: massimo
 * Date: 16.07.20
 * Time: 12:38
 */

namespace MyPromo\Connect\SDK\Repositories\Products;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use MyPromo\Connect\SDK\Exceptions\ProductException;
use MyPromo\Connect\SDK\Helpers\InventoryOptions;
use MyPromo\Connect\SDK\Helpers\PriceOptions;
use MyPromo\Connect\SDK\Helpers\ProductOptions;
use MyPromo\Connect\SDK\Helpers\ProductVariantOptions;
use MyPromo\Connect\SDK\Helpers\SeoOptions;
use MyPromo\Connect\SDK\Repositories\Repository;
use Psr\Cache\InvalidArgumentException;

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
     * @throws InvalidArgumentException
     * @throws ProductException|GuzzleException
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

            if ($response->getStatusCode() !== 200) {
                throw new ProductException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param $productId
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ProductException|GuzzleException
     */
    public function find($productId) {
        try {
            $response = $this->client->guzzle()->get('/v1/products/' . $productId, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ProductException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Available options:
     *      from
     *      per_page
     *      sku
     *      sku_fulfiller (For Fulfiller)
     *      shipping_from (For Merchant)
     *
     * You can use the @param array|InventoryOptions $options
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ProductException|GuzzleException
     */
    public function getInventory($options) {
        try {
            if ($options instanceof InventoryOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/inventory', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query' => $options
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ProductException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param $productInventory
     *
     * @return array
     * @throws ProductException
     * @throws InvalidArgumentException|GuzzleException
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

            if ($response->getStatusCode() !== 200) {
                throw new ProductException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * Available options:
     *      from
     *      per_page
     *      sku
     *      shipping_from
     *
     * You can use the @param array|PriceOptions $options
     *
     * @return array
     * @throws ProductException
     * @throws InvalidArgumentException|GuzzleException
     */
    public function getPrices($options) {
        try {
            if ($options instanceof PriceOptions) {
                $options = $options->toArray();
            }

            $response = $this->client->guzzle()->get('/v1/prices', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query' => $options
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ProductException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param $productPriceUpdate
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ProductException|GuzzleException
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

            if ($response->getStatusCode() !== 200) {
                throw new ProductException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductException($ex->getMessage(), $ex->getCode());
        }
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
     * @throws ProductException
     * @throws InvalidArgumentException|GuzzleException
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

            if ($response->getStatusCode() !== 200) {
                throw new ProductException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param $productSeoUpdate
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ProductException|GuzzleException
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

            if ($response->getStatusCode() !== 200) {
                throw new ProductException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param ProductVariantOptions $productVariantOptions
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ProductException|GuzzleException
     */
    public function variants(ProductVariantOptions $productVariantOptions)
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

            if ($response->getStatusCode() !== 200) {
                throw new ProductException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductException($ex->getMessage(), $ex->getCode());
        }
    }

    /**
     * @param $id
     *
     * @return array
     * @throws InvalidArgumentException
     * @throws ProductException|GuzzleException
     */
    public function variant($id)
    {
        try {
            $response = $this->client->guzzle()->get('/v1/variants/' . $id, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ]
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new ProductException($response->getBody(), $response->getStatusCode());
            }

            return json_decode($response->getBody(), true);
        } catch (Exception $ex) {
            throw new ProductException($ex->getMessage(), $ex->getCode());
        }
    }
}
