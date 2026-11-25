@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Pembayaran Service</h4>
    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">+ Tambah</a>
</div>
<table class="table table-bordered table-striped bg-white">
    <thead>
        <tr><th>Id Servis</th><th>Jumlah Biaya</th><th>Jenis Pembayaran</th><th>Keterangan</th><th>Aksi</th></tr>
    </thead>
    <tbody>
    @forelse($data as $d)
        <tr>
            <td>{{ $d->id_servis }}</td>
            <td>{{ 'Rp ' . number_format($d->jumlah_biaya, 0, ',', '.') }}</td>
            <td>{{ $d->jenis_pembayaran }}</td>
            <td>{{ $d->keterangan }}</td>
            <td>
                <a href="{{ route('pembayaran.edit', $d) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('pembayaran.destroy', $d) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Yakin hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" class="text-center">Belum ada data</td></tr>
    @endforelse
    </tbody>
</table>
@endsection
