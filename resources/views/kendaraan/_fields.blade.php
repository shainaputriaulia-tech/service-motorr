<div class="mb-3">
    <label class="form-label">No Plat Kendaraan</label>
    <input type="text" name="no_plat" class="form-control" value="{{ old('no_plat', $item->no_plat) }}"
           {{ $item->exists ? 'readonly' : 'required' }}>
    @if($item->exists)
        <small class="text-muted">No plat tidak dapat diubah.</small>
    @endif
</div>
<div class="mb-3">
    <label class="form-label d-block">Jenis Kendaraan</label>
    @foreach(['Matic', 'Manual Transmisi'] as $j)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_kendaraan" id="jenis{{ $loop->index }}"
                   value="{{ $j }}" {{ old('jenis_kendaraan', $item->jenis_kendaraan) == $j ? 'checked' : '' }} required>
            <label class="form-check-label" for="jenis{{ $loop->index }}">{{ $j }}</label>
        </div>
    @endforeach
</div>
<div class="mb-3">
    <label class="form-label">No STNK</label>
    <input type="text" name="no_stnk" class="form-control" value="{{ old('no_stnk', $item->no_stnk) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Tahun Pembuatan Kendaraan</label>
    <input type="number" name="tahun_pembuatan" min="1980" max="2100" class="form-control"
           value="{{ old('tahun_pembuatan', $item->tahun_pembuatan) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Nama Pemilik</label>
    <input type="text" name="nama_pemilik" class="form-control" value="{{ old('nama_pemilik', $item->nama_pemilik) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Warna Kendaraan</label>
    <input type="text" name="warna" class="form-control" value="{{ old('warna', $item->warna) }}" required>
</div>
