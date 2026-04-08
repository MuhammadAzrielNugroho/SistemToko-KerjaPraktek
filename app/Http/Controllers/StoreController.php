<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

use App\Imports\StoreImport;
use Maatwebsite\Excel\Facades\Excel;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::with(['category', 'city'])->latest()->get();
        return view('stores.index', compact('stores'));
    }

    public function create()
    {
        $categories = Category::all();
        $cities = City::all();

        return view('stores.create', compact('categories', 'cities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'store_name' => 'required',
            'store_id' => 'required|unique:stores',
            'category_id' => 'nullable|exists:categories,id',
            'city_id' => 'required|exists:cities,id', // 🔥 wajib
            'total_products' => 'required|integer',
            'store_age' => 'required|integer',
            'description' => 'nullable'
        ]);

        Store::create([
            'store_name' => $validated['store_name'],
            'store_id' => $validated['store_id'],
            'category_id' => $validated['category_id'] ?? 1,
            'city_id' => $validated['city_id'], // 🔥 ambil langsung
            'total_products' => $validated['total_products'],
            'store_age' => $validated['store_age'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('stores.index')->with('success', 'Data toko berhasil ditambahkan');
    }

    public function edit(Store $store)
    {
        $categories = Category::all();
        $cities = City::all();

        return view('stores.edit', compact('store', 'categories', 'cities'));
    }

    public function update(Request $request, Store $store)
    {
        $validated = $request->validate([
            'store_name' => 'required',
            'store_id' => 'required|unique:stores,store_id,' . $store->id,
            'category_id' => 'nullable|exists:categories,id',
            'city_id' => 'required|exists:cities,id', // 🔥 wajib
            'total_products' => 'required|integer',
            'store_age' => 'required|integer',
            'description' => 'nullable'
        ]);

        $store->update([
            'store_name' => $validated['store_name'],
            'store_id' => $validated['store_id'],
            'category_id' => $validated['category_id'] ?? 1,
            'city_id' => $validated['city_id'], // 🔥 FIX UTAMA
            'total_products' => $validated['total_products'],
            'store_age' => $validated['store_age'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('stores.index')->with('success', 'Data toko berhasil diupdate');
    }

    public function destroy(Store $store)
    {
        $store->delete();

        return redirect()->route('stores.index')->with('success', 'Data toko berhasil dihapus');
    }

    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv'
    ]);

    Excel::import(new StoreImport, $request->file('file'));

    return redirect()->route('stores.index')->with('success', 'Import berhasil!');
}

}