@extends('layouts.app')
@section('content')
<h4>Edit Pembayaran Service</h4>
<form method="POST" action="{{ route('pembayaran.update', $item) }}" class="card card-body">
    @csrf
    @method('PUT')
    @include('pembayaran._fields')
    <div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
@endsection
