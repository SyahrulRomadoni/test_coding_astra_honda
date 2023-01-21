<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Pesanan;
use App\Models\LogAktifitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index()
    {
        $model = Antrian::latest()->paginate(10);

        return response()->json([
            'status'  => "success",
            'message' => 'Antrian data has been found',
            'data'    =>  $model,
        ]);
    }

    public function antianKasir()
    {
        $model = Antrian::where('status', 1)->first();

        return response()->json([
            'status'  => "success",
            'message' => 'Antrian data has been found',
            'data'    =>  $model,
        ]);
    }

    public function pembayaranPesanan($id)
    {
        try {
            $model = Antrian::where('id', $id)->where('status', 1)->first();
            $model->status = 0;
            $model->save();

            $modelp = Pesanan::where('id', $model->id_pesanan)->first();

            $model1 = new LogAktifitas;
            $model1->id_users   = $modelp->id_users;
            $model1->id_pesanan = $model->id_pesanan;
            $model1->id_antrian = $model->id;
            $model1->save();

            if ($model) {
                // Return successful message
                return response()->json([
                    'status'  => "success",
                    'message' => 'Antrian successfully update',
                    'data'    =>  $model,
                ]);
            } else {
                // Return error message
                return response()->json([
                    'status'  => "error",
                    'message' => 'Antrian failed to update',
                ]);
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
