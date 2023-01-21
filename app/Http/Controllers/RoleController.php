<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $model = Role::paginate(10);

        return response()->json([
            'status'  => "success",
            'message' => 'Role data has been found',
            'data'    =>  $model,
        ]);
    }

    public function create(Request $request)
    {
        // Validate incoming request 
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        try {
            $model = new Role;
            $model->name = $request->input('name');
            $model->save();

            if ($model) {
                // Return successful message
                return response()->json([
                    'status'  => "success",
                    'message' => 'Role successfully added',
                    'data'    => $model,
                ]);
            } else {
                // Return error message
                return response()->json([
                    'status'  => "success",
                    'message' => 'Role failed to added',
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
            'name' => 'required|string',
        ]);

        try {
            $model = Role::findOrFail($id);
            $model->name = $request->input('name');
            $model->save();

            if ($model) {
                // Return successful message
                return response()->json([
                    'status'  => "success",
                    'message' => 'Role successfully update',
                    'data'    => $model,
                ]);
            } else {
                // Return error message
                return response()->json([
                    'status'  => "success",
                    'message' => 'Role failed to update',
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
            $model = Role::findorFail($id);
            $model->delete();
            if ($model) {
                // Return successful message
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Role successfully deleted']
                );
            } else {
                // Return error message
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Role failed to deleted']
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

    public function search(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $search = $request->post('name');
        $model = Role::where('name', 'like',"%".$search."%")->paginate(10);
        return response()->json([
            'status'  => 'success',
            'message' => 'Role successfully searched',
            'data'    => $model,
        ]);
    }
}
