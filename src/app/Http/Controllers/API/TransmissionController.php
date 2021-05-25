<?php

namespace App\Http\Controllers\API;

use App\Models\Transmission;
use Illuminate\Routing\Controller as BaseController;

class TransmissionController extends BaseController
{

    public function index()
    {
        $transmissions = Transmission::all();

        return response($transmissions);
    }
}
