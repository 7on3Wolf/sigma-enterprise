@extends('layouts.app2')

@section('title', 'Edit Kategori')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4">Edit Kategori</h1>

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}"
                    required>
            </div>
            <button type="submit" class="btn btn-success">Perbarui</button>
        </form>
    </div>
@endsection
