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

    public function create(Request $request)
    {

        $user = \Auth::guard('api')->user();
        if (!$user) {
            return 'Not authenticated.';
        }

        $request->validate([
            'type_id' => 'required',
            'lon' => 'required',
            'lat' => 'required',
            'nv' => 'required',
            'zspr' => 'required',
            'console' => 'required',
            'isolation' => 'required',
            'grounded' => 'required',
            'disconnector' => 'required',
            'rev' => 'required'
        ]);

        $pole = Pole::create([
            'type_id' => $request->type_id,
            'lon' =>  $request->lon,
            'lat' =>  $request->lat,
            'nv' =>  $request->nv,
            'zspr' =>  $request->zspr,
            'console' =>  $request->console,
            'isolation' =>  $request->isolation,
            'grounded' =>  $request->grounded,
            'disconnector' =>  $request->disconnector,
            'rev' =>  $request->rev,
        ]);

        return response(['Successfully created']);
    }

    public function update(Request $request, $id)
    {
        $user = \Auth::guard('api')->user();
        if (!$user) {
            return 'Not authenticated.';
        }

        $pole = Pole::find($id);
        if (!$pole) {
            return 'Not pole found.';
        }

        $data = $request->validate([
            'type_id' => 'required',
            'lon' => 'required',
            'lat' => 'required',
            'nv' =>'required',
            'zspr' => 'required',
            'console' => 'required',
            'isolation' => 'required',
            'grounded' => 'required',
            'disconnector' => 'required',
            'rev' => 'required',

        ]);

        $pole->update($data);

        return response(['Successfully updated']);
    }

    public function delete($id)
    {
        $user = \Auth::guard('api')->user();
        if (!$user) {
            return 'Not authenticated.';
        }

        $pole = Pole::find($id);

        if (!$pole) {
            return response(['Pole not found']);
        }

        $pole->delete();

        return response(['Successfully deleted']);
    }
}
