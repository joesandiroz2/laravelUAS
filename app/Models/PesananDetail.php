<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pesanan_detail';
    protected $guarded = ['id'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan', 'id');
    }
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'kode_produk', 'kode');
    }
}
