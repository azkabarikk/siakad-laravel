
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Program Studi</h2>

    <form action="{{ route('prodi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Program Studi</label>
            <input type="text"
                   name="nama_prodi"
                   class="form-control"
                   value="{{ old('nama_prodi') }}">

            @error('nama_prodi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('prodi.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
