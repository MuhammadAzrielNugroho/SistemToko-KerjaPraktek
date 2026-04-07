@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Toko</h1>

    <a href="{{ route('stores.create') }}" class="btn btn-primary mb-3">Tambah Toko</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>ID</th>
                <th>Kategori</th>
                <th>Produk</th>
                <th>Kota</th>
                <th>Lama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stores as $store)
            <tr>
                <td>{{ $store->store_name }}</td>
                <td>{{ $store->store_id }}</td>
                <td>{{ $store->category->name ?? '-' }}</td>
                <td>{{ $store->total_products }}</td>

                <!-- FIX KOTA -->
                <td>{{ $store->city->name ?? '-' }}</td>

                <td>{{ $store->store_age }} tahun</td>
                <td>
                    <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('stores.destroy', $store->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection