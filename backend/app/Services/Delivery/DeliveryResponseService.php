<?php

namespace App\Services\Delivery;

use Illuminate\Support\Collection;

class DeliveryResponseService
{
    public function getListDeliveries(
        DeliveryInterface $delivery,
        float $distance,
        float $weight
    ): array {
        $list = $delivery->getListTransports($distance, $weight);
        $sorted = $list->sortBy('price')->sortBy('date');

        return $sorted->values()->all();
    }

    public function getListDeliveriesById(
        DeliveryInterface $delivery,
        float $distance,
        float $weight,
        int $companyId = null
    ): array {
        $list = $delivery->getListTransports($distance, $weight, $companyId);
        $sorted = $list->sortBy('price')->sortBy('date');

        return $sorted->values()->all();
    }
}
