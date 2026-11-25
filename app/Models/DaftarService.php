<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DaftarService extends Model
{
    protected $table = 'daftar_services';
    protected $primaryKey = 'id_servis';
    protected $fillable = ['no_plat', 'id_pelanggan', 'keluhan', 'tanggal_servis'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'no_plat', 'no_plat');
    }
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }
}