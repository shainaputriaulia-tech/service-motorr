@extends('layouts.app')
@section('content')
<h4>Tambah Kendaraan</h4>
<form method="POST" action="{{ route('kendaraan.store') }}" class="card card-body">
    @csrf
    @include('kendaraan._fields')
    <div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection
