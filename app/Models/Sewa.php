<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;
    protected $table = 'sewas';
    protected $fillable =  ['id_titip', 'tgl_awal', 'tgl_akhir'];

    public function titip()
    {
     return $this->belongsTo(Titip::class, 'id_titip');
    }
}
