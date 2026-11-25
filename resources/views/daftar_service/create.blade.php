@extends('layouts.app')
@section('content')
<h4>Tambah Daftar Service</h4>
<form method="POST" action="{{ route('daftar-service.store') }}" class="card card-body">
    @csrf
    @include('daftar_service._fields')
    <div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('daftar-service.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection
