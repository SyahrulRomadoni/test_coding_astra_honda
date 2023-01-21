<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function profile()
    {
        return response()->json([
            'status'  => "success",
            'message' => 'User data has been found',
            'data'    => Auth::user()
        ]);
    }

    public function allUsers()
    {
        return response()->json([
            'status'  => "success",
            'message' => 'User data has been found',
            'data'    =>  User::all()
        ]);
    }

    public function singleUser($id)
    {
        try {
            $model = User::findOrFail($id);
            return response()->json([
                'status'  => "success",
                'message' => 'User data has been found',
                'data'    => $model
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => "error",
                'message' => 'User data not found'
            ]);
        }
    }

}