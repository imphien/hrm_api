<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0.0',
    description: 'API Documentation for End user service',
    title: 'API Documentation'
)]

#[OA\Server(
    url: '/api',
    description: 'API App Server'
)]
abstract class Controller extends BaseController
{

}
