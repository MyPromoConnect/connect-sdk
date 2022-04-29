<?php

namespace MyPromo\Connect\SDK\Models;

use MyPromo\Connect\SDK\Contracts\Arrayable;

class ClientSettingMerchant implements Arrayable
{
    /**
     * @var int
     */
    protected $sent_to_production_delay;

    /**
     * @var bool
     */
    protected $has_to_supply_carrier;

    /**
     * @var bool
     */
    protected $has_to_supply_tracking_code;

    /**
     * @var int
     */
    protected $price_reset_logic;

    /**
     * @var int
     */
    protected $adjust_max_up_percentage;

    /**
     * @var int
     */
    protected $adjust_max_down_percentage;

    /**
     * @var bool
     */
    protected $activate_new_fulfillers;

    /**
     * @var bool
     */
    protected $activate_new_products;

    /**
     * @return int
     */
    public function getSentToProductionDelay(): int
    {
        return $this->sent_to_production_delay;
    }

    /**
     * @param int $sent_to_production_delay
     */
    public function setSentToProductionDelay(int $sent_to_production_delay)
    {
        $this->sent_to_production_delay = $sent_to_production_delay;
    }

    /**
     * @return bool
     */
    public function getHasToSupplyCarrier(): bool
    {
        return $this->has_to_supply_carrier;
    }

    /**
     * @param bool $has_to_supply_carrier
     */
    public function setHasToSupplyCarrier(bool $has_to_supply_carrier)
    {
        $this->has_to_supply_carrier = $has_to_supply_carrier;
    }

    /**
     * @return bool
     */
    public function getHasToSupplyTrackingCode(): bool
    {
        return $this->has_to_supply_tracking_code;
    }

    /**
     * @param bool $has_to_supply_tracking_code
     */
    public function setHasToSupplyTrackingCode(bool $has_to_supply_tracking_code)
    {
        $this->has_to_supply_tracking_code = $has_to_supply_tracking_code;
    }

    /**
     * @return int
     */
    public function getPriceResetLogic(): int
    {
        return $this->price_reset_logic;
    }

    /**
     * @param int $price_reset_logic
     */
    public function setPriceResetLogic(int $price_reset_logic)
    {
        $this->price_reset_logic = $price_reset_logic;
    }

    /**
     * @return int
     */
    public function getAdjustMaxUpPercentage(): int
    {
        return $this->adjust_max_up_percentage;
    }

    /**
     * @param int $adjust_max_up_percentage
     */
    public function setAdjustMaxUpPercentage(int $adjust_max_up_percentage)
    {
        $this->adjust_max_up_percentage = $adjust_max_up_percentage;
    }

    /**
     * @return int
     */
    public function getAdjustMaxDownPercentage(): int
    {
        return $this->adjust_max_down_percentage;
    }

    /**
     * @param int $adjust_max_down_percentage
     */
    public function setAdjustMaxDownPercentage(int $adjust_max_down_percentage)
    {
        $this->adjust_max_down_percentage = $adjust_max_down_percentage;
    }

    /**
     * @return bool
     */
    public function getActivateNewFulfiller(): bool
    {
        return $this->activate_new_fulfillers;
    }

    /**
     * @param bool $activate_new_fulfillers
     */
    public function setActivateNewFulfiller(bool $activate_new_fulfillers)
    {
        $this->activate_new_fulfillers = $activate_new_fulfillers;
    }

    /**
     * @return bool
     */
    public function getActivateNewProducts(): bool
    {
        return $this->activate_new_products;
    }

    /**
     * @param bool $activate_new_products
     */
    public function setActivateNewProducts(bool $activate_new_products)
    {
        $this->activate_new_products = $activate_new_products;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $resultArray = [];

        $resultArray['production'] = [
            'sent_to_production_delay' => $this->sent_to_production_delay
        ];

        $resultArray['shipping'] = [
            'has_to_supply_carrier'       => $this->has_to_supply_carrier,
            'has_to_supply_tracking_code' => $this->has_to_supply_tracking_code,
        ];

        $resultArray['price_rules'] = [
            'price_reset_logic'          => $this->price_reset_logic,
            'adjust_max_up_percentage'   => $this->adjust_max_up_percentage,
            'adjust_max_down_percentage' => $this->adjust_max_down_percentage
        ];

        $resultArray['automatisms'] = [
            'activate_new_fulfillers' => $this->activate_new_fulfillers,
            'activate_new_products'   => $this->activate_new_products
        ];

        return $resultArray;
    }
}
