@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Edit Kota</h1>

<div class="card shadow">
<div class="card-body">

<form action="{{ route('cities.update', $city->id) }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="name" value="{{ $city->name }}" class="form-control mb-3" required>

<button class="btn btn-primary">Update</button>

<a href="{{ route('cities.index') }}" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

@endsection