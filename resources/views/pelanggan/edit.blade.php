@extends('layouts.app')
@section('content')
<h4>Edit Pelanggan</h4>
<form method="POST" action="{{ route('pelanggan.update', $item) }}" class="card card-body">
    @csrf
    @method('PUT')
    @include('pelanggan._fields')
    <div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection
