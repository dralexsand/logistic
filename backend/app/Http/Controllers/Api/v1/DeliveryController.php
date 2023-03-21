<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Delivery\DeliveryGetByCompanyRequest;
use App\Http\Requests\Delivery\DeliveryGetRequest;
use App\Services\Dadata\DadataApiService;
use App\Services\Delivery\DeliveryFastService;
use App\Services\Delivery\DeliveryResponseService;
use App\Services\Delivery\DeliverySlowService;
use App\Services\DistanceService;
use Symfony\Component\HttpFoundation\Response;

class DeliveryController extends Controller
{
    public function __construct(
        private DadataApiService $dadataApiService,
        private DistanceService $distanceService,
        private DeliveryResponseService $deliveryResponseService
    ) {
    }

    /**
     * @param DeliveryGetRequest $request
     * @return array
     */
    public function getCompaniesWithPrices(DeliveryGetRequest $request): Response
    {
        $req = $request->all();

        $data = $this->dadataApiService->getAddressByCode($req['sourceKladr']);

        if (empty($data)) {
            return response([
                'error' => 'Error code sourceKladr',
                'success' => false
            ]);
        }

        $geoSource = $this->dadataApiService->extractGeoFromDadata($data);

        $data = $this->dadataApiService->getAddressByCode($req['targetKladr']);

        if (empty($data)) {
            return response([
                'error' => 'Error code targetKladr',
                'success' => false
            ]);
        }

        $geoTarget = $this->dadataApiService->extractGeoFromDadata($data);

        $distance = $this->distanceService->getDistance($geoSource, $geoTarget);


        $data = [
            'fast' => $this->deliveryResponseService->getListDeliveries(
                (new DeliveryFastService()),
                $distance,
                (float)$req['weight']
            ),
            'slow' => $this->deliveryResponseService->getListDeliveries(
                (new DeliverySlowService()),
                $distance,
                (float)$req['weight']
            ),
        ];

        return response([
            'data' => $data,
            'success' => true
        ]);
    }

    /**
     * @param DeliveryGetByCompanyRequest $request
     * @return array
     */
    public function getSpecificCompaniyWithPrice(DeliveryGetByCompanyRequest $request): Response
    {
        $req = $request->all();

        $data = $this->dadataApiService->getAddressByCode($req['sourceKladr']);

        if (empty($data)) {
            return response([
                'error' => 'Error code sourceKladr',
                'success' => false
            ]);
        }

        $geoSource = $this->dadataApiService->extractGeoFromDadata($data);

        $data = $this->dadataApiService->getAddressByCode($req['targetKladr']);

        if (empty($data)) {
            return response([
                'error' => 'Error code targetKladr',
                'success' => false
            ]);
        }

        $geoTarget = $this->dadataApiService->extractGeoFromDadata($data);

        $distance = $this->distanceService->getDistance($geoSource, $geoTarget);

        $data = [
            'fast' => $this->deliveryResponseService->getListDeliveriesById(
                (new DeliveryFastService()),
                $distance,
                (float)$req['weight'],
                $req['id']
            ),
            'slow' => $this->deliveryResponseService->getListDeliveriesById(
                (new DeliverySlowService()),
                $distance,
                (float)$req['weight'],
                $req['id']
            ),
        ];

        return response([
            'data' => $data,
            'success' => true
        ]);
    }
}
