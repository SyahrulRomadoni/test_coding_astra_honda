<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAktifitas extends Model
{
    protected $table = 'log_aktifitas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_users',
        'status_member',
        'id_antrian',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
