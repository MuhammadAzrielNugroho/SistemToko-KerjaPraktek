<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Category;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // TOTAL
        $totalToko = Store::count();
        $totalKategori = Category::count();
        $totalKota = City::count(); // 🔥 tambahan

        // CHART KATEGORI (BAR)
        $kategori = Store::select('categories.name', DB::raw('count(stores.id) as total'))
            ->leftJoin('categories', 'stores.category_id', '=', 'categories.id')
            ->groupBy('categories.name')
            ->get();

        $kategoriLabels = $kategori->pluck('name');
        $kategoriValues = $kategori->pluck('total');

        // 🔥 CHART KOTA (PIE)
        $kota = Store::select('cities.name', DB::raw('count(stores.id) as total'))
            ->leftJoin('cities', 'stores.city_id', '=', 'cities.id')
            ->groupBy('cities.name')
            ->get();

        $kotaLabels = $kota->pluck('name');
        $kotaValues = $kota->pluck('total');

        return view('dashboard', compact(
            'totalToko',
            'totalKategori',
            'totalKota',
            'kategoriLabels',
            'kategoriValues',
            'kotaLabels',
            'kotaValues'
        ));
    }
}