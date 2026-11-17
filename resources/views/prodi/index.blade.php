
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Program Studi</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('user_role') == 1)
        <a href="{{ route('prodi.create') }}"
           class="btn btn-primary mb-3">
            Tambah Prodi
        </a>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Prodi</th>
                <th>Nama Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($data as $p)
                <tr>
                    <td>{{ $p->id_prodi }}</td>
                    <td>{{ $p->nama_prodi }}</td>
                    <td>
                        @if (session('user_role') == 1)
                            <a href="{{ route('prodi.edit', $p->id_prodi) }}"
                               class="btn btn-warning btn-sm">
                                Ubah
                            </a>

                            <form action="{{ route('prodi.destroy', $p->id_prodi) }}"
                                  method="POST"
                                  style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data?')">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada data program studi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
