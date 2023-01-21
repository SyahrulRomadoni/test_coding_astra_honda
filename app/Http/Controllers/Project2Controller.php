<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Motorcycle;
use App\Models\Workshop;
use App\Models\Profile;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Project2Controller extends Controller
{
    public function json1()
    {

        $model = User::select('users.id', 'profile.full_name as name', 'users.email')
        ->join('profile', 'profile.id_users', 'users.id')
        ->join('booking', 'booking.id_users', 'users.id')
        ->with('booking.workshop', 'booking.motorcycle')
        ->where('users.id_role', 3)
        ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Data Successfuly Retrieved.',
            'data'    =>  $model,
        ]);
    }

    public function json2()
    {
        $model = Workshop::all();

        if ($model) {
            return response()->json([
                'status'  => 1,
                'message' => 'Data Successfuly Retrieved.',
                'data'    =>  $model,
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => 'Data Failed Retrieved.',
                'data'    =>  [],
            ]);
        }
    }

    public function json3()
    {
        $model = Booking::select(
            'profile.full_name as name',
            'users.email',
            'booking.booking_number',
            'booking.book_date',
            'workshop.code as ahass_code',
            'workshop.name as ahass_name',
            'workshop.address as ahass_address',
            'workshop.phone_number as ahass_contact',
            'workshop.distance as ahass_distance',
            'motorcycle.ut_code as motorcycle_ut_code',
            'motorcycle.name as motorcycle',
        )
        ->join('users', 'users.id', 'booking.id_users')
        ->join('profile', 'profile.id_users', 'users.id')
        ->join('workshop', 'workshop.id', 'booking.id_workshop')
        ->join('motorcycle', 'motorcycle.id', 'booking.id_motorcycle')
        ->get();

        if ($model) {
            return response()->json([
                'status'  => 1,
                'message' => 'Data Successfuly Retrieved.',
                'data'    =>  $model,
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => 'Data Failed Retrieved.',
                'data'    =>  [],
            ]);
        }
    }

    public function json4()
    {
        $model = Booking::select(
            'profile.full_name as name',
            'users.email',
            'booking.booking_number',
            'booking.book_date',
            'workshop.code as ahass_code',
            'workshop.name as ahass_name',
            'workshop.address as ahass_address',
            'workshop.phone_number as ahass_contact',
            'workshop.distance as ahass_distance',
            'motorcycle.ut_code as motorcycle_ut_code',
            'motorcycle.name as motorcycle',
        )
        ->join('users', 'users.id', 'booking.id_users')
        ->join('profile', 'profile.id_users', 'users.id')
        ->join('workshop', 'workshop.id', 'booking.id_workshop')
        ->join('motorcycle', 'motorcycle.id', 'booking.id_motorcycle')
        ->orderBy('workshop.distance', 'ASC')
        ->get();

        if ($model) {
            return response()->json([
                'status'  => 1,
                'message' => 'Data Successfuly Retrieved.',
                'data'    =>  $model,
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => 'Data Failed Retrieved.',
                'data'    =>  [],
            ]);
        }
    }
}
