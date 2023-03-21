<?php

namespace App\Services\Delivery;

use App\Models\Transport;

class DeliverySlowService extends AbstractDelivery
{
    private int $slowDeliveryBasePrice = 150;

    public function __construct()
    {
        parent::__construct();
        $this->setFastCoefficient(env('SLOW_COEFFICIENT', 1));
        $this->setSlowDeliveryBasePrice(env('SLOW_DELIVERY_BASE_PRICE', 150));
    }

    /**
     * @return int
     */
    public function getSlowDeliveryBasePrice(): int
    {
        return $this->slowDeliveryBasePrice;
    }

    /**
     * @param int $slowDeliveryBasePrice
     */
    public function setSlowDeliveryBasePrice(int $slowDeliveryBasePrice): void
    {
        $this->slowDeliveryBasePrice = $slowDeliveryBasePrice;
    }

    public function getPrice(array $transport, float $distance, float $weight): float
    {
        $distance = $distance / $this->getFastCoefficient();

        $price = $this->getSlowDeliveryBasePrice() *
            $transport['coefficient'] *
            $distance *
            $weight *
            $this->getWeightCoefficient();

        return round($price, 2);
    }

    protected function getDifferenceBetweenDates(int $days): int
    {
        //$today = date('Y-m-d');
        $dateDelivery = strtotime("+$days day");
        $diff = date_diff(date('Y-m-d'), $dateDelivery);
        return $diff->format("%a");
    }
}
