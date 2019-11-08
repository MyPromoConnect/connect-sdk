<?php

namespace MyPromo\Connect\SDK\Repositories\Orders;

use MyPromo\Connect\SDK\Exceptions\ClientException;
use MyPromo\Connect\SDK\Exceptions\MissingCredentialsException;
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
     * @throws ClientException
     * @throws InvalidArgumentException
     * @throws MissingCredentialsException
     * @throws OrderException
     * @see OrderOptions as its helper
     *
     */
    public function all($options)
    {
        if ($options instanceof OrderOptions) {
            $options = $options->toArray();
        }

        $response = $this->client->guzzle()->get('/v1/orders', [
            'headers' => [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
            'query'   => $options,
        ])
        ;

        if ($response->getStatusCode() !== 200) {
            throw new OrderException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param int $orderId
     *
     * @return array
     *
     * @throws ClientException
     * @throws InvalidArgumentException
     * @throws MissingCredentialsException
     * @throws OrderException
     */
    public function find($orderId)
    {
        $response = $this->client->guzzle()->get('/v1/orders/' . $orderId, [
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
        ])
        ;

        if ($response->getStatusCode() !== 200) {
            throw new OrderException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param Order $order
     *
     * @return array
     *
     * @throws ClientException
     * @throws MissingCredentialsException
     * @throws InvalidArgumentException
     * @throws OrderException
     */
    public function create($order)
    {
        $response = $this->client->guzzle()->post('/v1/orders', [
            'headers'            => [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
            RequestOptions::JSON => $order->toArray(),
        ])
        ;

        if ($response->getStatusCode() !== 201) {
            throw new OrderException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param int $orderId
     *
     * @return array
     *
     * @throws ClientException
     * @throws InvalidArgumentException
     * @throws MissingCredentialsException
     * @throws OrderException
     */
    public function submit($orderId)
    {
        $response = $this->client->guzzle()->post('/v1/orders/' . $orderId . '/submit', [
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
        ])
        ;

        if ($response->getStatusCode() !== 200) {
            throw new OrderException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @param int $orderId
     *
     * @return array
     *
     * @throws ClientException
     * @throws InvalidArgumentException
     * @throws MissingCredentialsException
     * @throws OrderException
     */
    public function cancel($orderId)
    {
        $response = $this->client->guzzle()->put('/v1/orders/' . $orderId . '/cancel', [
            'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
        ])
        ;

        if ($response->getStatusCode() !== 200) {
            throw new OrderException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }
}
