<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'antrian';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_pesanan',
        'nomer_antrian',
        'total_pembayaran',
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
        'id_users'
    ];
}
