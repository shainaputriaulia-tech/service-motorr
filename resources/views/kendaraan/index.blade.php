@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Kendaraan</h4>
    <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">+ Tambah</a>
</div>
<table class="table table-bordered table-striped bg-white">
    <thead>
        <tr><th>No Plat</th><th>Jenis</th><th>No STNK</th><th>Tahun</th><th>Nama Pemilik</th><th>Warna</th><th>Aksi</th></tr>
    </thead>
    <tbody>
    @forelse($data as $d)
        <tr>
            <td>{{ $d->no_plat }}</td>
            <td>{{ $d->jenis_kendaraan }}</td>
            <td>{{ $d->no_stnk }}</td>
            <td>{{ $d->tahun_pembuatan }}</td>
            <td>{{ $d->nama_pemilik }}</td>
            <td>{{ $d->warna }}</td>
            <td>
                <a href="{{ route('kendaraan.edit', $d) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('kendaraan.destroy', $d) }}" method="POST" class="d-inline"
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
