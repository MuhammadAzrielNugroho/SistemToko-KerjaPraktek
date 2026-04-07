@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Tambah Kategori</h1>

<div class="card shadow">
<div class="card-body">

<form action="{{ route('categories.store') }}" method="POST">
@csrf

<input type="text" name="name" class="form-control mb-3" placeholder="Nama Kategori">

<button class="btn btn-success">Simpan</button>

</form>

</div>
</div>

@endsection