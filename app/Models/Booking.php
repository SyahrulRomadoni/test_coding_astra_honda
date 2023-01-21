<?php

namespace App\Models;

use App\Models\Motorcycle;
use App\Models\Workshop;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'id_users',
        'id_workshop',
        'id_motorcycle',
        'booking_number',
        'book_date',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'id',
        'id_users',
        'id_workshop',
        'id_motorcycle'
    ];

    public function workshop()
    {
        return $this->hasMany('App\Models\Workshop', 'id', 'id_workshop')->select(['id', 'code', 'name']);
    }

    public function motorcycle()
    {
        return $this->hasMany('App\Models\Motorcycle', 'id', 'id_motorcycle')->select(['id', 'name', 'ut_code']);
    }
}
