<?php

namespace Connect\SDK\Repositories\Orders;

use Connect\SDK\Exceptions\ClientException;
use Connect\SDK\Exceptions\MissingCredentialsException;
use Connect\SDK\Exceptions\MissingOrderException;
use Connect\SDK\Exceptions\OrderException;
use Connect\SDK\Models\OrderItem;
use Connect\SDK\Repositories\Repository;
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
     * @throws ClientException
     * @throws MissingCredentialsException
     * @throws InvalidArgumentException
     */
    public function submit($orderItem)
    {
        $orderId = $orderItem->getOrderId();
        if (!isset($orderId)) {
            throw new MissingOrderException('Missing Order-ID.');
        }

        $response = $this->client->guzzle()->post('/v1/orders/' . $orderId . '/items', [
            'headers'            => [
                'Accept'        => 'application/json',
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->client->auth()->get(),
            ],
            RequestOptions::JSON => $orderItem->toArray(),
        ])
        ;

        if ($response->getStatusCode() !== 201) {
            throw new OrderException($response->getBody(), $response->getStatusCode());
        }

        return json_decode($response->getBody(), true);
    }
}
