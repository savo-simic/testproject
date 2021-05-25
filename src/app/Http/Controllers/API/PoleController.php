<?php

namespace App\Http\Controllers\API;

use App\Models\Pole;
use Illuminate\Routing\Controller as BaseController;

class PoleController extends BaseController
{

    public function index()
    {
        $poles = Pole::all();

        return response($poles);
    }
}
