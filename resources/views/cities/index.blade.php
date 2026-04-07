@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Data Kota</h1>

<a href="{{ route('cities.create') }}" class="btn btn-primary mb-3">
    + Tambah Kota
</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow">
<div class="card-body">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Kota</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cities as $city)
        <tr>
            <td>{{ $city->name }}</td>
            <td>
                <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('cities.destroy', $city->id) }}" method="POST" style="display:inline;">
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
</div>

@endsection