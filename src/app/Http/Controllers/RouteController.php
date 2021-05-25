<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Transmission;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class RouteController extends BaseController
{

    public function index()
    {
        $routes = Route::latest()->paginate(5);

        return view('routes.index',compact('routes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show($id)
    {
        $route = Route::findOrFail($id);

        return view('routes.show',compact('route'));
    }

    public function create()
    {
        $transmissions = Transmission::pluck('id', 'name');
        $routes = Route::pluck('id', 'name');

        return view('routes.create', compact('transmissions','routes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'transmission_id' => 'required',
        ]);

        Route::create($request->all());

        return redirect()->route('routes.index')
            ->with('success','Route created successfully.');
    }

    public function edit($id)
    {
        $route = Route::findOrFail($id);
        $routes = Route::pluck('id', 'name');
        $transmissions = Transmission::pluck('id', 'name');

        return view('routes.edit',compact('route','transmissions', 'routes'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'transmission_id' => 'required',
            'parent_id' => 'sometimes'
        ]);

        Route::whereId($id)->update($data);

        return redirect()->route('routes.index')
            ->with('success','Route updated successfully');
    }

    public function destroy($id)
    {
        $route = Route::findOrFail($id);
        $route->delete();

        return redirect()->route('routes.index')
            ->with('success','Route deleted successfully');
    }

}
