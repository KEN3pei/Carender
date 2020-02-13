<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\CarenderService;

class Carender extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CarenderService::class;
    }
}