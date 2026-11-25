@extends('layouts.app')
@section('content')
<h4>Tambah Pembayaran Service</h4>
<form method="POST" action="{{ route('pembayaran.store') }}" class="card card-body">
    @csrf
    @include('pembayaran._fields')
    <div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection
