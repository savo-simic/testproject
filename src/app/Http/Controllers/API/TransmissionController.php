<?php

namespace App\Http\Controllers\API;

use App\Models\Transmission;
use Illuminate\Routing\Controller as BaseController;

class TransmissionController extends BaseController
{

    public function index()
    {
        $transmissions = Transmission::all();
        $data = [];
        foreach ($transmissions as $key => $transmission) {
            $data[$key]['id'] = $transmission->id;
            $data[$key]['name'] = $transmission->name;
            $data[$key]['routes'] = $transmission->routes;
        }

        return response(['data' => $data]);
    }
}
