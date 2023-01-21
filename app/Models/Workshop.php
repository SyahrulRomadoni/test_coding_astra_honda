<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $table = 'workshop';

    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'name',
        'address',
        'phone_number',
        'distance',
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
