@extends('layouts.app2')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4">Tambah Kategori</h1>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
