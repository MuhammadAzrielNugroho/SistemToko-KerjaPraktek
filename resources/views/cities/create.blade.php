@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Tambah Kota</h1>

<div class="card shadow">
<div class="card-body">

<form action="{{ route('cities.store') }}" method="POST">
@csrf

<input type="text" name="name" class="form-control mb-3" placeholder="Nama Kota" required>

<button class="btn btn-success">Simpan</button>

<a href="{{ route('cities.index') }}" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

@endsection