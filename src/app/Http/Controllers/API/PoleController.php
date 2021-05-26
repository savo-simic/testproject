<?php

namespace App\Http\Controllers\API;

use App\Models\Pole;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class PoleController extends BaseController
{

    public function index()
    {
        $poles = Pole::all();

        return response($poles);
    }

    public function update(Request $request, $id)
    {
        $user = $request->user('api');
        if (!$user) {
            return 'Not authenticated.';
        }

        $pole = Pole::find($id);
        if (!$pole) {
            return 'Not pole found.';
        }

        $data = $request->validate([
            'type_id' => ['required'],
            'lon' => ['required'],
            'lat' => ['required'],
            'nv' => ['required'],
            'zspr' => ['required'],
            'console' => ['required'],
            'isolation' => ['required'],
            'grounded' => ['required'],
            'disconnector' => ['required'],
            'rev' => ['required'],

        ]);

        $pole->update($data);

        return response(['Successfully updated']);
    }
}
