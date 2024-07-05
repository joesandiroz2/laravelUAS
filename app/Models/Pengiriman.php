<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengiriman extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pengiriman';
    protected $guarded = ['id'];
    public function jasa(): BelongsTo
    {
        return $this->belongsTo(JasaPengiriman::class, 'kode_jasa', 'kode');
    }
}
