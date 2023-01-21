<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate incoming request 
        $this->validate($request, [

            // 'id_role'         => 'required|string',
            'email'           => 'required|email|unique:users',
            'password'        => 'required|confirmed',

            'full_name'       => 'required|string',
            'no_phone'        => 'required|string',
            'date_of_birth'   => 'required|string',
            'place_of_birth'  => 'required|string',
            'address'         => 'required|string',
            // 'profile_picture' => 'required|string',

        ]);

        try {

            $model = new User;
            $model->id_role  = "3";
            $model->email    = $request->input('email');
            $plainPassword   = $request->input('password');
            $model->password = app('hash')->make($plainPassword);
            $model->save();

            $model_profile = new Profile;
            $model_profile->id_users        = $model->id;
            $model_profile->full_name       = $request->input('full_name');
            $model_profile->no_phone        = $request->input('no_phone');
            $model_profile->date_of_birth   = $request->input('date_of_birth');
            $model_profile->place_of_birth  = $request->input('place_of_birth');
            $model_profile->address         = $request->input('address');
            $model_profile->profile_picture = $request->input('profile_picture');
            $model_profile->save();

            // Return successful response
            return response()->json([
                'status'  => "success",
                'message' => 'Registration successful',
                'data'    => $model,
            ]);

        } catch (\Exception $e) {
            // Return error message
            return response()->json([
                'status'  => "error",
                'message' => 'Registration failed'
            ]);
        }
    }

    public function login(Request $request)
    {
        // Validate incoming request 
        $this->validate($request, [
            'email'    => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }

        // return $this->respondWithToken($token);
        return response()->json([
            'status' => "success",
            'user'    => auth()->user(),    
            'token'   => $token   
        ]);
    }

    public function logout () {
        Auth::logout();
        return response()->json([
            'status' => "success",
            'message' => 'Successfully logged out'
        ]);
    }
}