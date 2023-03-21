<?php

namespace App\Services\Delivery;

use Illuminate\Support\Collection;

interface DeliveryInterface
{
    public function getPrice(array $transport, float $distance, float $weight);

    public function getPeriod(float $distance): string;

    public function getListTransports(float $distance, float $weight, int $companyId = null): Collection;
}
