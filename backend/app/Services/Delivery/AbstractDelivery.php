<?php

namespace App\Services\Delivery;

use App\Models\Transport;
use Illuminate\Support\Collection;

abstract class AbstractDelivery implements DeliveryInterface
{

    private int $fastCoefficient = 5;
    private int $weightCoefficient = 10;

    public function __construct()
    {
        $this->setFastCoefficient(env('FAST_COEFFICIENT', 5));
        $this->setWeightCoefficient(env('WEIGHT_COEFFICIENT', 10));
    }

    protected function getDaysByDistance(float $distnace): int
    {
        return floor($distnace / $this->getFastCoefficient());
    }

    /**
     * @return int
     */
    public function getFastCoefficient(): int
    {
        return $this->fastCoefficient;
    }

    /**
     * @param int $fastCoefficient
     */
    public function setFastCoefficient(int $fastCoefficient): void
    {
        $this->fastCoefficient = $fastCoefficient;
    }

    /**
     * @return int
     */
    public function getWeightCoefficient(): int
    {
        return $this->weightCoefficient;
    }

    /**
     * @param int $weightCoefficient
     */
    public function setWeightCoefficient(int $weightCoefficient): void
    {
        $this->weightCoefficient = $weightCoefficient;
    }

    abstract public function getPrice(array $transport, float $distance, float $weight);

    public function getPeriod(float $distance): string
    {
        $days = $this->getDaysByDistance($distance);

        return date('Y-m-d', strtotime("+ $days day"));
    }

    public function getListTransports(float $distance, float $weight, int $companyId = null): Collection
    {
        $list = $companyId === null
            ? Transport::all()->toArray()
            : Transport::where('id', $companyId)->get()->toArray();

        //dd($list);

        $result = [];

        foreach ($list as $transport) {
            $result[] = [
                'company' => $transport['company'],
                'price' => $this->getPrice($transport, $distance, $weight),
                'date' => $this->getPeriod($distance),
                'error' => 'false'
            ];
        }

        return collect($result);
    }
}
