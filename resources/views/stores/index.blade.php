@extends('layouts.app')

@section('content')
@php use Illuminate\Support\Str; @endphp

<style>
    /* 🔥 kecilin font biar muat */
    table {
        font-size: 13px;
    }

    /* 🔥 biar tidak melebar */
    td, th {
        white-space: nowrap;
        vertical-align: middle;
    }

    /* 🔥 khusus kolom link */
    .col-link {
        max-width: 220px;
        white-space: normal;
        word-break: break-all;
    }

    /* 🔥 nama toko */
    .col-name {
        max-width: 160px;
        white-space: normal;
    }

    /* 🔥 aksi biar rapat */
    .aksi-btn .btn {
        padding: 3px 8px;
        font-size: 12px;
    }
</style>

<div class="container-fluid">
    <h1 class="h4 mb-3">Data Toko</h1>

    <!-- HEADER -->
    <div class="d-flex flex-wrap align-items-center mb-3 gap-2">

        <a href="{{ route('stores.create') }}" class="btn btn-primary btn-sm mr-2 mb-2">
            Tambah Toko
        </a>

        <form action="{{ route('stores.import') }}" method="POST" enctype="multipart/form-data"
              class="d-flex flex-wrap align-items-center">
            @csrf

            <input type="file" name="file"
                   class="form-control form-control-sm mr-2 mb-2"
                   style="width:200px"
                   required>

            <button class="btn btn-success btn-sm mb-2">
                Import
            </button>
        </form>

    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- 🔥 TABLE RESPONSIVE -->
    <div class="table-responsive">
        <table class="table table-bordered table-sm">

            <thead class="bg-light">
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

                    <td class="col-name">
                        {{ $store->store_name }}
                    </td>

                    <td class="col-link">
                        <a href="{{ Str::startsWith($store->store_id, ['http://','https://']) ? $store->store_id : 'https://' . $store->store_id }}"
                           target="_blank"
                           style="color:#4e73df;">
                            {{ $store->store_id }}
                        </a>
                    </td>

                    <td>{{ $store->category->name ?? '-' }}</td>

                    <td>{{ $store->total_products }}</td>

                    <td>{{ $store->city->name ?? '-' }}</td>

                    <td>{{ $store->store_age }} th</td>

                    <td class="aksi-btn">
                        <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-warning btn-sm mb-1">
                            Edit
                        </a>

                        <form action="{{ route('stores.destroy', $store->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus?')" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>
@endsection