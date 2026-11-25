<div class="mb-3">
    <label class="form-label">Id Servis Pelanggan</label>
    <input type="text" class="form-control" value="{{ $item->exists ? $item->id_servis : '(otomatis)' }}" readonly>
</div>
<div class="mb-3">
    <label class="form-label">No Plat Kendaraan</label>
    <select name="no_plat" class="form-select" required>
        <option value="">-- Pilih No Plat --</option>
        @foreach($kendaraans as $k)
            <option value="{{ $k->no_plat }}" {{ old('no_plat', $item->no_plat) == $k->no_plat ? 'selected' : '' }}>
                {{ $k->no_plat }} - {{ $k->nama_pemilik }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Id Pelanggan</label>
    <select name="id_pelanggan" id="id_pelanggan" class="form-select" required>
        <option value="">-- Pilih Id Pelanggan --</option>
        @foreach($pelanggans as $p)
            <option value="{{ $p->id_pelanggan }}" data-nama="{{ $p->nama_lengkap }}"
                {{ old('id_pelanggan', $item->id_pelanggan) == $p->id_pelanggan ? 'selected' : '' }}>
                {{ $p->id_pelanggan }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Nama Pelanggan (otomatis)</label>
    <input type="text" id="nama_pelanggan" class="form-control" readonly>
</div>
<div class="mb-3">
    <label class="form-label">Keluhan Kendaraan</label>
    <textarea name="keluhan" class="form-control" rows="3" required>{{ old('keluhan', $item->keluhan) }}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Tanggal Servis</label>
    <input type="date" name="tanggal_servis" class="form-control" value="{{ old('tanggal_servis', $item->tanggal_servis) }}" required>
</div>

<script>
    const selPelanggan = document.getElementById('id_pelanggan');
    const namaPelanggan = document.getElementById('nama_pelanggan');
    function isiNama() {
        const opt = selPelanggan.options[selPelanggan.selectedIndex];
        namaPelanggan.value = (opt && opt.dataset.nama) ? opt.dataset.nama : '';
    }
    selPelanggan.addEventListener('change', isiNama);
    isiNama();
</script>
