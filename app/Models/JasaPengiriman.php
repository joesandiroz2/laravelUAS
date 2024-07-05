<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaPengiriman extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'jasa_pengiriman';
    protected $fillable = ['kode', 'nama'];
}
