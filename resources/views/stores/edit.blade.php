@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Edit Toko</h1>

<div class="card shadow">
<div class="card-body">

<form action="{{ route('stores.update', $store->id) }}" method="POST">
@csrf
@method('PUT')

<!-- NAMA TOKO -->
<input type="text" name="store_name" value="{{ old('store_name', $store->store_name) }}" class="form-control mb-3" placeholder="Nama Toko" required>

<!-- STORE ID -->
<input type="text" name="store_id" value="{{ old('store_id', $store->store_id) }}" class="form-control mb-3" placeholder="ID Toko" required>

<!-- KATEGORI -->
<select name="category_id" class="form-control mb-3">
    <option value="">-- Pilih Kategori --</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}" 
            {{ old('category_id', $store->category_id) == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
        </option>
    @endforeach
</select>

<!-- KOTA -->
<select name="city_id" class="form-control mb-3">
    <option value="">-- Pilih Kota --</option>
    @foreach($cities as $city)
        <option value="{{ $city->id }}" 
            {{ old('city_id', $store->city_id) == $city->id ? 'selected' : '' }}>
            {{ $city->name }}
        </option>
    @endforeach
</select>

<!-- JUMLAH PRODUK -->
<input type="number" name="total_products" value="{{ old('total_products', $store->total_products) }}" class="form-control mb-3" placeholder="Jumlah Produk" required>

<!-- LAMA TOKO -->
<input type="number" name="store_age" value="{{ old('store_age', $store->store_age) }}" class="form-control mb-3" placeholder="Lama Toko" required>

<!-- DESKRIPSI -->
<textarea name="description" class="form-control mb-3" placeholder="Keterangan">{{ old('description', $store->description) }}</textarea>

<!-- BUTTON -->
<button class="btn btn-primary">Update</button>
<a href="{{ route('stores.index') }}" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

@endsection