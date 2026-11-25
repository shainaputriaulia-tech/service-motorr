<div class="mb-3">
    <label class="form-label">Id Pelanggan</label>
    <input type="text" class="form-control" value="{{ $item->exists ? $item->id_pelanggan : '(otomatis)' }}" readonly>
</div>
<div class="mb-3">
    <label class="form-label">Nama Lengkap</label>
    <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $item->nama_lengkap) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">No HP</label>
    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $item->no_hp) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Alamat Pelanggan</label>
    <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat', $item->alamat) }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Pekerjaan</label>
    <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan', $item->pekerjaan) }}" required>
</div>
