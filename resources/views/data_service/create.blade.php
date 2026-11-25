@extends('layouts.app')
@section('content')
<h4>Tambah Service</h4>
<form method="POST" action="{{ route('data-service.store') }}" class="card card-body">
    @csrf
    @include('data_service._fields')
    <div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('data-service.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection
