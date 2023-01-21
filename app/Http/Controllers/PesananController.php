<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Member;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $model = Pesanan::paginate(10);

        return response()->json([
            'status'  => "success",
            'message' => 'Pesanan data has been found',
            'data'    =>  $model,
        ]);
    }

    public function create(Request $request)
    {
        // Validate incoming request 
        $this->validate($request, [
            'id_users'          => 'required|numeric',
            'pesanan'           => 'required|string',
            'total'             => 'required|numeric',
            'diskon'            => 'required|numeric|max:100',
            'nomer_meja'        => 'required|string',
            'status_pembayaran' => 'required|string',
            'status'            => 'required|numeric',
        ]);

        // Cek data users
        $cek_data = User::where('id', $request->input('id_users'))->first();
        if ($cek_data == null) {
            return response()->json([
                'status'  => "error",
                'message' => 'Mohon maaf data users tersebut tidak terdaftar di server'
            ]);
        }

        // Cek data member
        $cek_data1 = Member::where('id_users', $request->input('id_users'))->first();
        if ($cek_data1 == null) {
            return response()->json([
                'status'  => "error",
                'message' => 'Mohon maaf data users tersebut tidak terdaftar sebagai Premium, Membert maupun Non Member'
            ]);
        }

        try {
            // Model Pesanan
            $model = new Pesanan;
            $model->id_users            = $request->input('id_users');
            $model->pesanan             = $request->input('pesanan');
            $model->total               = $request->input('total');
            $model->diskon              = $request->input('diskon');
            $model->nomer_meja          = $request->input('nomer_meja');
            $model->status_pembayaran   = $request->input('status_pembayaran');
            $model->status              = $request->input('status');
            $model->save();

            // Hitung Pembayaran + Diskon + Diskon Premium dan Members
            $diskon_member = null;
            if ($cek_data1->status_member == "Premium") {
                $diskon_member = 10;
            }
            if ($cek_data1->status_member == "Member") {
                $diskon_member = 5;
            }
            if ($cek_data1->status_member == "Non Member") {
                $diskon_member = 0;
            }
            $total_diskon = $request->input('diskon') + $diskon_member;
            $diskon = ( $total_diskon / 100) * $request->input('total');
            $bayar = $request->input('total') - $diskon;

            // Sistem Otomatis Nomer Antrian
            $nomer_antrian = 0;
            $antrian = Antrian::whereDate('created_at', date('Y-m-d'))->orderBy('id', 'DESC')->first();
            if ($antrian == null) {
                $nomer_antrian = 1;
            } else {
                $otomatis = $antrian->nomer_antrian + 1;
                $nomer_antrian = $otomatis;
            }

            // Model Antrian
            $model1 = new Antrian;
            $model1->id_pesanan         = $model->id;
            $model1->nomer_antrian      = $nomer_antrian;
            $model1->total_pembayaran   = $bayar;
            $model1->status             = 1;
            $model1->save();

            if ($model) {
                // Return successful message
                return response()->json([
                    'status'  => "success",
                    'message' => 'Pesanan successfully added',
                    'data'    => $model,
                ]);
            } else {
                // Return error message
                return response()->json([
                    'status'  => "error",
                    'message' => 'Pesanan failed to added'
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
            'id_users'          => 'required|numeric',
            'pesanan'           => 'required|string',
            'total'             => 'required|numeric',
            'diskon'            => 'required|numeric|max:100',
            'nomer_meja'        => 'required|string',
            'status_pembayaran' => 'required|string',
            'status'            => 'required|numeric',
        ]);

        // Cek data users
        $cek_data = User::where('id', $request->input('id_users'))->first();
        if ($cek_data == null) {
            return response()->json([
                'status'  => "error",
                'message' => 'Mohon maaf data users tersebut tidak terdaftar di server'
            ]);
        }

        // Cek data member
        $cek_data1 = Member::where('id_users', $request->input('id_users'))->first();
        if ($cek_data1 == null) {
            return response()->json([
                'status'  => "error",
                'message' => 'Mohon maaf data users tersebut tidak terdaftar sebagai Premium, Membert maupun Non Member'
            ]);
        }

        try {
            // Model Pesanan
            $model = Pesanan::findOrFail($id);
            $model->id_users            = $request->input('id_users');
            $model->pesanan             = $request->input('pesanan');
            $model->total               = $request->input('total');
            $model->diskon              = $request->input('diskon');
            $model->nomer_meja          = $request->input('nomer_meja');
            $model->status_pembayaran   = $request->input('status_pembayaran');
            $model->status              = $request->input('status');
            $model->save();

            // Hitung Pembayaran + Diskon + Diskon Premium dan Members
            $diskon_member = null;
            if ($cek_data1->status_member == "Premium") {
                $diskon_member = 10;
            }
            if ($cek_data1->status_member == "Member") {
                $diskon_member = 5;
            }
            if ($cek_data1->status_member == "Non Member") {
                $diskon_member = 0;
            }
            $total_diskon = $request->input('diskon') + $diskon_member;
            $diskon = ( $total_diskon / 100) * $request->input('total');
            $bayar = $request->input('total') - $diskon;

            // Model Antrian
            $model1 = Antrian::where('id_pesanan', $id)->first();
            $model1->total_pembayaran   = $bayar;
            $model1->save();

            if ($model) {
                // Return successful message
                return response()->json([
                    'status'  => "success",
                    'message' => 'Pesanan successfully update',
                    'data'    => $model,
                ]);
            } else {
                // Return error message
                return response()->json([
                    'status'  => "error",
                    'message' => 'Pesanan failed to update'
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
            $model = Pesanan::findorFail($id);
            $model->delete();

            $model1 = Antrian::where('id_pesanan', $id)->first();
            $model1->delete();

            if ($model) {
                // Return successful message
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Pesanan successfully deleted']
                );
            } else {
                // Return error message
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Pesanan failed to deleted']
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
