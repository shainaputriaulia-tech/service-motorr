<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    private function rules(bool $create = false): array
    {
        $rules = [
            'id_servis'        => 'required|exists:daftar_services,id_servis',
            'jumlah_biaya'     => 'required|integer|min:0',
            'jenis_pembayaran' => 'required|in:Cash / Tunai,Non Tunai',
            'keterangan'       => 'nullable|string',
        ];

        return $rules;
    }

    private function opsi(): array
    {
        return ['servis' => DaftarService::with('pelanggan')->get()];
    }

    public function index(Request $r)
    {
        $data = Pembayaran::with('daftarService')->get();
        return $r->expectsJson()
            ? response()->json($data)
            : view('pembayaran.index', compact('data'));
    }

    public function create()
    {
        return view('pembayaran.create', ['item' => new Pembayaran] + $this->opsi());
    }

    public function store(Request $r)
    {
        $item = Pembayaran::create($r->validate($this->rules(true)));
        return $r->expectsJson()
            ? response()->json($item, 201)
            : redirect()->route('pembayaran.index')->with('success', 'Data berhasil disimpan');
    }

    public function show(Pembayaran $pembayaran)
    {
        return response()->json($pembayaran);
    }

    public function edit(Pembayaran $pembayaran)
    {
        return view('pembayaran.edit', ['item' => $pembayaran] + $this->opsi());
    }

    public function update(Request $r, Pembayaran $pembayaran)
    {
        $pembayaran->update($r->validate($this->rules(false)));
        return $r->expectsJson()
            ? response()->json($pembayaran)
            : redirect()->route('pembayaran.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Request $r, Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return $r->expectsJson()
            ? response()->json(['message' => 'Data dihapus'])
            : redirect()->route('pembayaran.index')->with('success', 'Data berhasil dihapus');
    }
}
