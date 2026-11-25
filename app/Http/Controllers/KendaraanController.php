<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    private function rules(bool $create = false): array
    {
        $rules = [
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk'         => 'required|string|max:50',
            'tahun_pembuatan' => 'required|digits:4',
            'nama_pemilik'    => 'required|string|max:255',
            'warna'           => 'required|string|max:50',
        ];
        if ($create) {
            $rules['no_plat'] = 'required|string|max:15|unique:kendaraans,no_plat';
        }
        return $rules;
    }

    private function opsi(): array
    {
        return [];
    }

    public function index(Request $r)
    {
        $data = Kendaraan::get();
        return $r->expectsJson()
            ? response()->json($data)
            : view('kendaraan.index', compact('data'));
    }

    public function create()
    {
        return view('kendaraan.create', ['item' => new Kendaraan] + $this->opsi());
    }

    public function store(Request $r)
    {
        $item = Kendaraan::create($r->validate($this->rules(true)));
        return $r->expectsJson()
            ? response()->json($item, 201)
            : redirect()->route('kendaraan.index')->with('success', 'Data berhasil disimpan');
    }

    public function show(Kendaraan $kendaraan)
    {
        return response()->json($kendaraan);
    }

    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.edit', ['item' => $kendaraan] + $this->opsi());
    }

    public function update(Request $r, Kendaraan $kendaraan)
    {
        $kendaraan->update($r->validate($this->rules(false)));
        return $r->expectsJson()
            ? response()->json($kendaraan)
            : redirect()->route('kendaraan.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Request $r, Kendaraan $kendaraan)
    {
        $kendaraan->delete();
        return $r->expectsJson()
            ? response()->json(['message' => 'Data dihapus'])
            : redirect()->route('kendaraan.index')->with('success', 'Data berhasil dihapus');
    }
}
