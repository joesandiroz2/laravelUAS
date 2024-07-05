<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pesanan extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'pesanan';
    protected $guarded = ['id'];

    public function detail(): HasMany
    {
        return $this->hasMany(PesananDetail::class, 'id_pesanan', 'id');
    }
    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'id_pesanan', 'id');
    }
    public function pengiriman(): HasMany
    {
        return $this->hasMany(Pengiriman::class, 'id_pesanan', 'id');
    }
    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id');
    }
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'kode_status', 'kode');
    }
}
