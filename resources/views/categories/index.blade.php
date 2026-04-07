@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Data Kategori</h1>

<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
    + Tambah Kategori
</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow">
<div class="card-body">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $c)
        <tr>
            <td>{{ $c->name }}</td>
            <td>
                <a href="{{ route('categories.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('categories.destroy', $c->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
</div>

@endsection