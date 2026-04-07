<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::latest()->get();
        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        City::create([
            'name' => $request->name
        ]);

        return redirect('/cities')->with('success', 'Kota berhasil ditambahkan');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('cities.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);

        $request->validate([
            'name' => 'required'
        ]);

        $city->update([
            'name' => $request->name
        ]);

        return redirect('/cities')->with('success', 'Kota berhasil diupdate');
    }

    public function destroy($id)
    {
        City::findOrFail($id)->delete();
        return redirect('/cities')->with('success', 'Kota berhasil dihapus');
    }
}