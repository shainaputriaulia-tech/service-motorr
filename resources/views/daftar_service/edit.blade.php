@extends('layouts.app')
@section('content')
<h4>Edit Daftar Service</h4>
<form method="POST" action="{{ route('daftar-service.update', $item) }}" class="card card-body">
    @csrf
    @method('PUT')
    @include('daftar_service._fields')
    <div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('daftar-service.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection
