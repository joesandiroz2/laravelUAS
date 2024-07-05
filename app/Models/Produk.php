<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'produk';
    protected $fillable = ['kode', 'nama', 'deskripsi', 'harga', 'kode_kategori', 'gambar'];
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kode_kategori', 'kode');
    }
}
