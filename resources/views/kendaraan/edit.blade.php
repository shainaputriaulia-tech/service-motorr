@extends('layouts.app')
@section('content')
<h4>Edit Kendaraan</h4>
<form method="POST" action="{{ route('kendaraan.update', $item) }}" class="card card-body">
    @csrf
    @method('PUT')
    @include('kendaraan._fields')
    <div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection
