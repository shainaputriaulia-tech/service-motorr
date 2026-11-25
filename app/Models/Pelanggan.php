<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';
    protected $primaryKey = 'id_pelanggan';
    protected $fillable = ['nama_lengkap', 'no_hp', 'alamat', 'pekerjaan'];
}