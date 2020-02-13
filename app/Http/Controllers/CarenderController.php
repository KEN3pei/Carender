<?php

namespace App\Http\Controllers;

use App\Facades\Carender;
use App\Services\CarenderService;
use Illuminate\Http\Request;

class CarenderController extends Controller
{
    private $service;
    
    public function __construct(CarenderService $service)
    {
        $this->service = $service;
    }
    
    public function index()
    {
        return view('carender', [
            // 'weeks'         => $this->service->getWeeks(),
            'weeks'         => Carender::getWeeks(),
            'month'         => Carender::getMonth(),
            'prev'          => Carender::getPrev(),
            'next'          => Carender::getNext(),
        ]);
    }
    
}
