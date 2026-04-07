@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Toko</h1>

    <form action="{{ route('stores.store') }}" method="POST">
        @csrf

        <input type="text" name="store_name" placeholder="Nama Toko" class="form-control mb-2" required>

        <input type="text" name="store_id" placeholder="ID Toko" class="form-control mb-2" required>

        <!-- KATEGORI -->
        <select name="category_id" class="form-control mb-2">
            <option value="">Pilih Kategori</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>

        <!-- KOTA (FIX) -->
        <select name="city_id" class="form-control mb-2" required>
            <option value="">Pilih Kota</option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>

        <input type="number" name="total_products" placeholder="Jumlah Produk" class="form-control mb-2">

        <input type="number" name="store_age" placeholder="Lama Toko (tahun)" class="form-control mb-2">

        <textarea name="description" placeholder="Keterangan" class="form-control mb-2"></textarea>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection