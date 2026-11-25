<div class="mb-3">
    <label class="form-label">Id Servis Pelanggan</label>
    <select name="id_servis" id="id_servis" class="form-select" required>
        <option value="">-- Pilih Id Servis --</option>
        @foreach($servis as $s)
            <option value="{{ $s->id_servis }}" data-keluhan="{{ $s->keluhan }}"
                {{ old('id_servis', $item->id_servis) == $s->id_servis ? 'selected' : '' }}>
                {{ $s->id_servis }} - {{ $s->no_plat }} ({{ $s->pelanggan->nama_lengkap ?? '-' }})
            </option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Keluhan Kendaraan (otomatis)</label>
    <textarea id="keluhan" class="form-control" rows="2" readonly></textarea>
</div>
<div class="mb-3">
    <label class="form-label">Estimasi Service</label>
    <input type="text" name="estimasi_service" class="form-control" placeholder="contoh: 2 hari"
           value="{{ old('estimasi_service', $item->estimasi_service) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Nama Mekanik</label>
    <input type="text" name="nama_mekanik" class="form-control" value="{{ old('nama_mekanik', $item->nama_mekanik) }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Sparepart Pengganti</label>
    <input type="text" name="sparepart_pengganti" class="form-control" value="{{ old('sparepart_pengganti', $item->sparepart_pengganti) }}" required>
</div>

<script>
    const selServis = document.getElementById('id_servis');
    const isiKel = document.getElementById('keluhan');
    function isiKeluhan() {
        const opt = selServis.options[selServis.selectedIndex];
        isiKel.value = (opt && opt.dataset.keluhan) ? opt.dataset.keluhan : '';
    }
    selServis.addEventListener('change', isiKeluhan);
    isiKeluhan();
</script>
