@extends('layouts.app')
@section('content')
<h4>Edit Service</h4>
<form method="POST" action="{{ route('data-service.update', $item) }}" class="card card-body">
    @csrf
    @method('PUT')
    @include('data_service._fields')
    <div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('data-service.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection
