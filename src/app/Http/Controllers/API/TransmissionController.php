<?php

namespace App\Http\Controllers\API;

use App\Models\Transmission;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

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

    public function create(Request $request)
    {

        $user = \Auth::guard('api')->user();
        if (!$user) {
            return 'Not authenticated.';
        }

        $request->validate([
            'name' => 'required',
        ]);

        $pole = Transmission::create([
            'name' => $request->name,
        ]);

        return response(['Successfully created']);
    }

    public function update(Request $request, $id)
    {
        $user = $request->user('api');
        if (!$user) {
            return 'Not authenticated.';
        }

        $transmission = Transmission::find($id);
        if (!$transmission) {
            return 'Not transmission found.';
        }

        $data = $request->validate([
            'name' => ['required'],
        ]);

        $transmission->update($data);

        return response(['Successfully updated']);
    }

    public function delete($id)
    {
        $user = \Auth::guard('api')->user();
        if (!$user) {
            return 'Not authenticated.';
        }

        $transmission = Transmission::find($id);

        if (!$transmission) {
            return response(['Transmission not found']);
        }

        $transmission->delete();

        return response(['Successfully deleted']);
    }
}
