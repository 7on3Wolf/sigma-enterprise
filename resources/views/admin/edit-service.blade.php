@extends('layouts.app2')

@section('title', 'Edit Service')

@section('content')
    <div class="container py-16">
        <h2>Edit Layanan</h2>

        <form action="{{ route('admin.service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Layanan -->
            <div class="mb-4">
                <label for="name" class="form-label">Nama Layanan</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $service->name }}" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea id="description" name="description" class="form-control" rows="4" required>{{ $service->description }}</textarea>
            </div>

            <!-- Kategori -->
            <div class="mb-4">
                <label for="category_id" class="form-label">Kategori</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $service->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Ikon -->
            <div class="mb-4">
                <label for="icon" class="form-label">Ikon</label>
                <input type="file" id="icon" name="icon" class="form-control">
                <small>Kosongkan jika tidak ingin mengganti ikon.</small>
            </div>

            <!-- Tombol Simpan -->
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
