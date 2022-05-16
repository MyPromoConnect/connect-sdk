<?php

namespace MyPromo\Connect\SDK\Repositories\Orders;

use Exception;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Exceptions\InvalidResponseException;
use MyPromo\Connect\SDK\Helpers\Orders\OrderOptions;
use MyPromo\Connect\SDK\Models\Orders\Order;
use MyPromo\Connect\SDK\Repositories\Repository;
use GuzzleHttp\RequestOptions;

class OrderRepository extends Repository
{
    /**
     * @param OrderOptions $options
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function all(OrderOptions $options)
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
     * @param int $orderId
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function find(int $orderId)
    {
        try {
            $response = $this->client->guzzle()->get('/v1/orders/' . $orderId, [
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
     * @param Order $order
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     * @throws InvalidResponseException
     */
    public function create(Order $order)
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
        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 201) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        $body = json_decode($response->getBody(), true);

        if (!empty($body) && isset($body['id'])) {
            $order->setId($body['id']);
        } else {
            throw new InvalidResponseException('Unable retrive required data from response.', 422);
        }

        return $body;
    }

    /**
     * @param int $orderId
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function submit(int $orderId)
    {
        try {
            $response = $this->client->guzzle()->patch('/v1/orders/' . $orderId . '/submit', [
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
     * @param int $orderId
     * @return mixed
     * @throws ApiRequestException
     * @throws ApiResponseException
     */
    public function cancel(int $orderId)
    {
        try {
            $response = $this->client->guzzle()->put('/v1/orders/' . $orderId . '/cancel', [
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
}
