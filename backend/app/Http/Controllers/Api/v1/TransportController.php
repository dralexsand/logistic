<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transport\TransportStoreRequest;
use App\Models\Transport;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transports = Transport::all();

        if ($transports) {
            return response([
                'data' => $transports,
                'success' => true
            ]);
        } else {
            return response([
                'error' => 'Error get Transport',
                'success' => false
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransportStoreRequest $request)
    {
        $transport = Transport::insert($request->all());

        if ($transport) {
            return response([
                'data' => $request->all(),
                'success' => true
            ]);
        } else {
            return response([
                'error' => 'Error store Transport',
                'success' => false
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $transport = Transport::where('id', $id)->first();

        if ($transport) {
            return response([
                'data' => $transport,
                'success' => true
            ]);
        } else {
            return response([
                'error' => 'Transport not found',
                'success' => false
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransportStoreRequest $request, int $id)
    {
        $transport = Transport::where('id', $id)->first();

        if ($transport) {
            $transport->update($request->all());

            return response([
                'data' => $transport,
                'success' => true
            ]);
        } else {
            return response([
                'error' => 'Transport not found',
                'success' => false
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transport = Transport::where('id', $id)->first();

        if ($transport) {
            return response([
                'message' => "Transport with $id deleted",
                'success' => true
            ]);
        } else {
            return response([
                'error' => 'Transport not found',
                'success' => false
            ]);
        }
    }
}
