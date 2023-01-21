<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_users',
        'pesanan',
        'total',
        'diskon',
        'nomer_meja',
        'status_pembayaran',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'id',
    ];
}
