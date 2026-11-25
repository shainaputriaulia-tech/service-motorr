<?php

namespace App\Http\Controllers;

use App\Models\DataService;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    private function rules(bool $create = false): array
    {
        $rules = [
            'id_servis'           => 'required|exists:daftar_services,id_servis',
            'estimasi_service'    => 'required|string|max:255',
            'nama_mekanik'        => 'required|string|max:255',
            'sparepart_pengganti' => 'required|string|max:255',
        ];

        return $rules;
    }

    private function opsi(): array
    {
        return ['servis' => DaftarService::with('pelanggan')->get()];
    }

    public function index(Request $r)
    {
        $data = DataService::with('daftarService')->get();
        return $r->expectsJson()
            ? response()->json($data)
            : view('data_service.index', compact('data'));
    }

    public function create()
    {
        return view('data_service.create', ['item' => new DataService] + $this->opsi());
    }

    public function store(Request $r)
    {
        $item = DataService::create($r->validate($this->rules(true)));
        return $r->expectsJson()
            ? response()->json($item, 201)
            : redirect()->route('data-service.index')->with('success', 'Data berhasil disimpan');
    }

    public function show(DataService $dataService)
    {
        return response()->json($dataService);
    }

    public function edit(DataService $dataService)
    {
        return view('data_service.edit', ['item' => $dataService] + $this->opsi());
    }

    public function update(Request $r, DataService $dataService)
    {
        $dataService->update($r->validate($this->rules(false)));
        return $r->expectsJson()
            ? response()->json($dataService)
            : redirect()->route('data-service.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Request $r, DataService $dataService)
    {
        $dataService->delete();
        return $r->expectsJson()
            ? response()->json(['message' => 'Data dihapus'])
            : redirect()->route('data-service.index')->with('success', 'Data berhasil dihapus');
    }
}
