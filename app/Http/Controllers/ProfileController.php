<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
        $model = Profile::where('id_users', $id)->first();

        return response()->json([
            'status'  => "success",
            'message' => 'Profile data has been found',
            'data'    =>  $model,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request 
        $this->validate($request, [
            'full_name'       => 'required|string',
            'no_phone'        => 'required|string',
            'date_of_birth'   => 'required|string',
            'place_of_birth'  => 'required|string',
            'address'         => 'required|string',
            'profile_picture' => 'required|string',
        ]);

        try {
            $model = Profile::findOrFail($id);
            $model->full_name       = $request->input('full_name');
            $model->no_phone        = $request->input('no_phone');
            $model->date_of_birth   = $request->input('date_of_birth');
            $model->place_of_birth  = $request->input('place_of_birth');
            $model->address         = $request->input('address');
            $model->profile_picture = $request->input('profile_picture');
            $model->save();

            if ($model) {
                // Return successful message
                return response()->json([
                    'status'  => "success",
                    'message' => 'Profile successfully update',
                    'data'    => $model,
                ]);
            } else {
                // Return error message
                return response()->json([
                    'status'  => "error",
                    'message' => 'Profile failed to update'
                ]);
            }
        } catch (\Exception $e) {
            // Return error message
            return response()->json([
                'status'  => "error",
                'message' => 'An error occurred on the server'
            ]);
        }
    }
}
