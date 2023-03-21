<?php

namespace App\Services\Dadata;

use Dadata\DadataClient;

class DadataApiService
{
    public function __construct(private DadataCredentialService $credentialService)
    {
    }

    public function getAddressByCode(string $code)
    {
        $dadata = new DadataClient($this->credentialService->getDadataApiKey(), null);

        return $dadata->findById("address", $code, 1);
    }

    public function extractGeoFromDadata(array $data)
    {
        return [
            'geo_lat' => $data[0]['data']['geo_lat'],
            'geo_lon' => $data[0]['data']['geo_lon'],
        ];
    }

}
