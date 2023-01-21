<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $model = Member::paginate(10);

        return response()->json([
            'status'  => "success",
            'message' => 'Member data has been found',
            'data'    =>  $model,
        ]);
    }

    public function create(Request $request)
    {
        // Validate incoming request 
        $this->validate($request, [
            'id_users'      => 'required|numeric',
            'status_member' => 'required|string',
            'status'        => 'required|numeric',
        ]);

        // Cek data users
        $cek_data = User::where('id', $request->input('id_users'))->first();
        if ($cek_data == null) {
            return response()->json([
                'status'  => "error",
                'message' => 'Mohon maaf data users tersebut tidak terdaftar di server'
            ]);
        }

        try {
            $model = new Member;
            $model->id_users      = $request->input('id_users');
            $model->status_member = $request->input('status_member');
            $model->status        = $request->input('status');
            $model->save();

            if ($model) {
                // Return successful message
                return response()->json([
                    'status'  => "success",
                    'message' => 'Member successfully added',
                    'data'    => $model,
                ]);
            } else {
                // Return error message
                return response()->json([
                    'status'  => "error",
                    'message' => 'Member failed to added'
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

    public function update(Request $request, $id)
    {
        // Validate incoming request 
        $this->validate($request, [
            'id_users'      => 'required|numeric',
            'status_member' => 'required|string',
            'status'        => 'required|numeric',
        ]);

        // Cek data users
        $cek_data = User::where('id', $request->input('id_users'))->first();
        if ($cek_data == null) {
            return response()->json([
                'status'  => "error",
                'message' => 'Mohon maaf data users tersebut tidak terdaftar di server'
            ]);
        }

        try {
            $model = Member::findOrFail($id);
            $model->id_users      = $request->input('id_users');
            $model->status_member = $request->input('status_member');
            $model->status        = $request->input('status');
            $model->save();

            if ($model) {
                // Return successful message
                return response()->json([
                    'status'  => "success",
                    'message' => 'Member successfully update',
                    'data'    => $model,
                ]);
            } else {
                // Return error message
                return response()->json([
                    'status'  => "error",
                    'message' => 'Member failed to update'
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

    public function delete(Request $request, $id)
    {
        try {
            $model = Member::findorFail($id);
            $model->delete();

            if ($model) {
                // Return successful message
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Member successfully deleted']
                );
            } else {
                // Return error message
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Member failed to deleted']
                );
            }
        } catch (\Exception $e) {
            // Return error message
            return response()->json([
               'status'  => 'error',
               'message' => $e->getMessage ()
            ]);
        }
    }
}
