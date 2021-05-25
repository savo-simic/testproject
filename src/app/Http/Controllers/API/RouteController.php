<?php

namespace App\Http\Controllers\API;

use App\Models\Route;
use Illuminate\Routing\Controller as BaseController;

class RouteController extends BaseController
{

    public function index()
    {
        $routes = Route::all();

        return response($routes);
    }
}
