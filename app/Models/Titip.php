<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titip extends Model
{
    use HasFactory;
    protected $table = 'titips';
    protected $fillable = ['id_kendaraan', 'tgl_titip', 'harga_sewa', 'tgl_berakhir'];

    public function kendaraan()
       {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan');
       }
}

