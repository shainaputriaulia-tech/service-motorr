@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Service</h4>
    <a href="{{ route('data-service.create') }}" class="btn btn-primary">+ Tambah</a>
</div>
<table class="table table-bordered table-striped bg-white">
    <thead>
        <tr><th>Id Servis</th><th>Keluhan</th><th>Estimasi</th><th>Mekanik</th><th>Sparepart</th><th>Aksi</th></tr>
    </thead>
    <tbody>
    @forelse($data as $d)
        <tr>
            <td>{{ $d->id_servis }}</td>
            <td>{{ $d->daftarService->keluhan ?? '-' }}</td>
            <td>{{ $d->estimasi_service }}</td>
            <td>{{ $d->nama_mekanik }}</td>
            <td>{{ $d->sparepart_pengganti }}</td>
            <td>
                <a href="{{ route('data-service.edit', $d) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('data-service.destroy', $d) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Yakin hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6" class="text-center">Belum ada data</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
