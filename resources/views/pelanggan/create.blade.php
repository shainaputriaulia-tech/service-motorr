@extends('layouts.app')
@section('content')
<h4>Tambah Pelanggan</h4>
<form method="POST" action="{{ route('pelanggan.store') }}" class="card card-body">
    @csrf
    @include('pelanggan._fields')
    <div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection
