<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = ['id_servis', 'jumlah_biaya', 'jenis_pembayaran', 'keterangan'];

    public function daftarService()
    {
        return $this->belongsTo(DaftarService::class, 'id_servis', 'id_servis');
    }
}