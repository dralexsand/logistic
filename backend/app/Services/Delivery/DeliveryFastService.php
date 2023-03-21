<?php

namespace App\Services\Delivery;

use App\Models\Transport;

class DeliveryFastService extends AbstractDelivery
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getPrice(array $transport, float $distance, float $weight)
    {
        $distance = $distance / $this->getFastCoefficient();

        $price = (float)$transport['price'] *
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
