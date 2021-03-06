<?php

namespace MyPromo\Connect\SDK\Repositories\Orders;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use MyPromo\Connect\SDK\Exceptions\OrderException;
use MyPromo\Connect\SDK\Helpers\OrderOptions;
use MyPromo\Connect\SDK\Models\Order;
use MyPromo\Connect\SDK\Repositories\Repository;
use GuzzleHttp\RequestOptions;
use Psr\Cache\InvalidArgumentException;

class OrderRepository extends Repository
{
    /**
     * Available options:
     *      from
     *      per_page
     *      created_from
     *      created_to
     *      updated_from
     *      updated_to
     *
     * You can use the @param array|OrderOptions $options
     *
     * @return array
     *
     * @throws InvalidArgumentException
     * @throws OrderException|GuzzleException
     * @see OrderOptions as its helper
     *
     */
    public function all($options)
    {
        if ($options instanceof OrderOptions) {
            $options = $options->toArray();
        }

        try {
            $response = $this->client->guzzle()->get('/v1/orders', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                'query' => $options,
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new OrderException($response->getBody(), $response->getStatusCode());
            }

        } catch (Exception $ex) {
            throw new OrderException($ex->getMessage(), $ex->getCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param int $orderId
     *
     * @return array
     *
     * @throws InvalidArgumentException
     * @throws OrderException|GuzzleException
     */
    public function find($orderId)
    {
        try {
            $response = $this->client->guzzle()->get('/v1/orders/' . $orderId, [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new OrderException($response->getBody(), $response->getStatusCode());
            }

        } catch (Exception $ex) {
            throw new OrderException($ex->getMessage(), $ex->getCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param Order $order
     *
     * @return array
     *
     * @throws InvalidArgumentException
     * @throws OrderException|GuzzleException
     */
    public function create($order)
    {
        try {
            $response = $this->client->guzzle()->post('/v1/orders', [
                'headers'            => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $order->toArray(),
            ]);

            if ($response->getStatusCode() !== 201) {
                throw new OrderException($response->getBody(), $response->getStatusCode());
            }

            $body = json_decode($response->getBody(), true);
            $order->setId($body['id']);

        } catch (Exception $ex) {
            throw new OrderException($ex->getMessage(), $ex->getCode());
        }

        return $body;
    }

    /**
     * @param int $orderId
     *
     * @return array
     *
     * @throws InvalidArgumentException
     * @throws OrderException|GuzzleException
     */
    public function submit($orderId)
    {
        try {
            $response = $this->client->guzzle()->post('/v1/orders/' . $orderId . '/submit', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new OrderException($response->getBody(), $response->getStatusCode());
            }
        } catch (Exception $ex) {
            throw new OrderException($ex->getMessage(), $ex->getCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param int $orderId
     *
     * @return array
     *
     * @throws InvalidArgumentException
     * @throws OrderException|GuzzleException
     */
    public function cancel($orderId)
    {
        try {
            $response = $this->client->guzzle()->put('/v1/orders/' . $orderId . '/cancel', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
            ]);

            if ($response->getStatusCode() !== 200) {
                throw new OrderException($response->getBody(), $response->getStatusCode());
            }

        } catch (Exception $ex) {
            throw new OrderException($ex->getMessage(), $ex->getCode());
        }

        return json_decode($response->getBody(), true);
    }
}
