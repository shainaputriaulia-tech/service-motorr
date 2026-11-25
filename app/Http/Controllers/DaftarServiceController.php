<?php

namespace App\Http\Controllers;

use App\Models\DaftarService;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DaftarServiceController extends Controller
{
    private function rules(bool $create = false): array
    {
        $rules = [
            'no_plat'        => 'required|exists:kendaraans,no_plat',
            'id_pelanggan'   => 'required|exists:pelanggans,id_pelanggan',
            'keluhan'        => 'required|string',
            'tanggal_servis' => 'required|date',
        ];

        return $rules;
    }

    private function opsi(): array
    {
        return ['kendaraans' => Kendaraan::all(), 'pelanggans' => Pelanggan::all()];
    }

    public function index(Request $r)
    {
        $data = DaftarService::with(['kendaraan', 'pelanggan'])->get();
        return $r->expectsJson()
            ? response()->json($data)
            : view('daftar_service.index', compact('data'));
    }

    public function create()
    {
        return view('daftar_service.create', ['item' => new DaftarService] + $this->opsi());
    }

    public function store(Request $r)
    {
        $item = DaftarService::create($r->validate($this->rules(true)));
        return $r->expectsJson()
            ? response()->json($item, 201)
            : redirect()->route('daftar-service.index')->with('success', 'Data berhasil disimpan');
    }

    public function show(DaftarService $daftarService)
    {
        return response()->json($daftarService);
    }

    public function edit(DaftarService $daftarService)
    {
        return view('daftar_service.edit', ['item' => $daftarService] + $this->opsi());
    }

    public function update(Request $r, DaftarService $daftarService)
    {
        $daftarService->update($r->validate($this->rules(false)));
        return $r->expectsJson()
            ? response()->json($daftarService)
            : redirect()->route('daftar-service.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Request $r, DaftarService $daftarService)
    {
        $daftarService->delete();
        return $r->expectsJson()
            ? response()->json(['message' => 'Data dihapus'])
            : redirect()->route('daftar-service.index')->with('success', 'Data berhasil dihapus');
    }
}
