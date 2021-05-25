<?php

namespace App\Http\Controllers;

use App\Models\Pole;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PoleController extends BaseController
{

    public function index()
    {
        $poles = Pole::latest()->paginate(5);

        return view('poles.index',compact('poles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show($id)
    {
        $pole = Pole::findOrFail($id);

        return view('poles.show',compact('pole'));
    }

    public function create()
    {
        return view('poles.create');
    }


    public function store(Request $request)
    {
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
        ]);

        Pole::create($request->all());

        return redirect()->route('poles.index')
            ->with('success','Pole created successfully.');
    }

    public function edit($id)
    {
        $pole = Pole::findOrFail($id);

        return view('poles.edit',compact('pole'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'type_id' => 'required',
            'lon' => 'required',
            'lat' => 'required',
            'nv' => 'required',
            'zspr' => 'required',
            'console' => 'required',
            'isolation' => 'required',
            'grounded' => 'required',
            'disconnector' => 'required',
        ]);

        Pole::whereId($id)->update($data);

        return redirect()->route('poles.index')
            ->with('success','Pole updated successfully');
    }

    public function destroy($id)
    {
        $pole = Pole::findOrFail($id);
        $pole->delete();

        return redirect()->route('poles.index')
            ->with('success','Pole deleted successfully');
    }

}
