<?php

namespace App\Http\Controllers;

use App\Services\Test\TestControllerService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(private TestControllerService $testControllerService)
    {
    }

    public function index()
    {
        //$data = $this->testControllerService->getIndexData();
        $data = [];

        return view('pages.home', [
            'data' => $data,
        ]);
    }
}
