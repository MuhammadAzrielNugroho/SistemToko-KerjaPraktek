@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Edit Kategori</h1>

<div class="card shadow">
<div class="card-body">

<form action="{{ route('categories.update', $category->id) }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="name" value="{{ $category->name }}" class="form-control mb-3">

<button class="btn btn-primary">Update</button>

</form>

</div>
</div>

@endsection