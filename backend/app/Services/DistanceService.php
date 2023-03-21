<?php

namespace App\Services;

class DistanceService
{

    public function getDistance(array $geoSource, array $geoTarget): float
    {
        return $this->calculateDistance(
            (float)$geoSource['geo_lat'],
            (float)$geoSource['geo_lon'],
            (float)$geoTarget['geo_lat'],
            (float)$geoTarget['geo_lon']
        );
    }

    public function calculateDistance(
        float $latSource,
        float $lonSource,
        float $latTarget,
        float $lonTarget
    ): float {
        $radiusEarth = 6371;

        $dLat = deg2rad($latTarget - $latSource);
        $dLon = deg2rad($lonTarget - $lonSource);

        $a = sin($dLat / 2)
            * sin($dLat / 2)
            + cos(deg2rad($latSource))
            * cos(deg2rad($latTarget))
            * sin($dLon / 2)
            * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $d = $radiusEarth * $c;

        return round($d, 2);
    }
}
