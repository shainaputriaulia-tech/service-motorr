@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Daftar Service</h4>
    <a href="{{ route('daftar-service.create') }}" class="btn btn-primary">+ Tambah</a>
</div>
<table class="table table-bordered table-striped bg-white">
    <thead>
        <tr><th>Id Servis</th><th>No Plat</th><th>Id Pelanggan</th><th>Nama Pelanggan</th><th>Keluhan</th><th>Tanggal</th><th>Aksi</th></tr>
    </thead>
    <tbody>
    @forelse($data as $d)
        <tr>
            <td>{{ $d->id_servis }}</td>
            <td>{{ $d->no_plat }}</td>
            <td>{{ $d->id_pelanggan }}</td>
            <td>{{ $d->pelanggan->nama_lengkap ?? '-' }}</td>
            <td>{{ $d->keluhan }}</td>
            <td>{{ $d->tanggal_servis }}</td>
            <td>
                <a href="{{ route('daftar-service.edit', $d) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('daftar-service.destroy', $d) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Yakin hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="7" class="text-center">Belum ada data</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
