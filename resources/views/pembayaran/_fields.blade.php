<div class="mb-3">
    <label class="form-label">Id Servis Pelanggan</label>
    <select name="id_servis" class="form-select" required>
        <option value="">-- Pilih Id Servis --</option>
        @foreach($servis as $s)
            <option value="{{ $s->id_servis }}" {{ old('id_servis', $item->id_servis) == $s->id_servis ? 'selected' : '' }}>
                {{ $s->id_servis }} - {{ $s->no_plat }} ({{ $s->pelanggan->nama_lengkap ?? '-' }})
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Jumlah Biaya Servis (Rp)</label>
    <input type="number" name="jumlah_biaya" min="0" class="form-control" value="{{ old('jumlah_biaya', $item->jumlah_biaya) }}" required>
</div>
<div class="mb-3">
    <label class="form-label d-block">Jenis Pembayaran</label>
    @foreach(['Cash / Tunai', 'Non Tunai'] as $j)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis_pembayaran" id="bayar{{ $loop->index }}"
                   value="{{ $j }}" {{ old('jenis_pembayaran', $item->jenis_pembayaran) == $j ? 'checked' : '' }} required>
            <label class="form-check-label" for="bayar{{ $loop->index }}">{{ $j }}</label>
        </div>
    @endforeach
</div>
<div class="mb-3">
    <label class="form-label">Keterangan</label>
    <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $item->keterangan) }}</textarea>
</div>
