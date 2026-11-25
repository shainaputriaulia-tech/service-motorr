<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    private function rules(bool $create = false): array
    {
        $rules = [
            'nama_lengkap' => 'required|string|max:255',
            'no_hp'        => 'required|string|max:20',
            'alamat'       => 'required|string',
            'pekerjaan'    => 'required|string|max:255',
        ];

        return $rules;
    }

    private function opsi(): array
    {
        return [];
    }

    public function index(Request $r)
    {
        $data = Pelanggan::get();
        return $r->expectsJson()
            ? response()->json($data)
            : view('pelanggan.index', compact('data'));
    }

    public function create()
    {
        return view('pelanggan.create', ['item' => new Pelanggan] + $this->opsi());
    }

    public function store(Request $r)
    {
        $item = Pelanggan::create($r->validate($this->rules(true)));
        return $r->expectsJson()
            ? response()->json($item, 201)
            : redirect()->route('pelanggan.index')->with('success', 'Data berhasil disimpan');
    }

    public function show(Pelanggan $pelanggan)
    {
        return response()->json($pelanggan);
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', ['item' => $pelanggan] + $this->opsi());
    }

    public function update(Request $r, Pelanggan $pelanggan)
    {
        $pelanggan->update($r->validate($this->rules(false)));
        return $r->expectsJson()
            ? response()->json($pelanggan)
            : redirect()->route('pelanggan.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Request $r, Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return $r->expectsJson()
            ? response()->json(['message' => 'Data dihapus'])
            : redirect()->route('pelanggan.index')->with('success', 'Data berhasil dihapus');
    }
}
