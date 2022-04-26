<?php

namespace MyPromo\Connect\SDK\Repositories\Orders;

use Exception;
use MyPromo\Connect\SDK\Exceptions\ApiRequestException;
use MyPromo\Connect\SDK\Exceptions\ApiResponseException;
use MyPromo\Connect\SDK\Exceptions\MissingOrderException;
use MyPromo\Connect\SDK\Exceptions\OrderException;
use MyPromo\Connect\SDK\Models\OrderItem;
use MyPromo\Connect\SDK\Repositories\Repository;
use GuzzleHttp\RequestOptions;
use Psr\Cache\InvalidArgumentException;

/**
 * Class OrderItemRepository
 * @package Connect\SDK\Repositories
 */
class OrderItemRepository extends Repository
{
    /**
     * @param OrderItem $orderItem
     *
     * @return array
     *
     * @throws MissingOrderException
     * @throws OrderException
     * @throws InvalidArgumentException
     */
    public function submit($orderItem)
    {
        $orderId = $orderItem->getOrderId();

        if (!isset($orderId)) {
            throw new MissingOrderException('Missing Order-ID.');
        }

        try {
            $response = $this->client->guzzle()->post('/v1/orders/' . $orderId . '/items', [
                'headers'            => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer ' . $this->client->auth()->get(),
                ],
                RequestOptions::JSON => $orderItem->toArray(),
            ]);
        } catch (Exception $ex) {
            throw new ApiRequestException($ex->getMessage(), $ex->getCode());
        }

        if ($response->getStatusCode() !== 201) {
            throw new ApiResponseException($response->getBody(), $response->getStatusCode());
        }

        $body = json_decode($response->getBody(), true);


        return $body;
    }
}
