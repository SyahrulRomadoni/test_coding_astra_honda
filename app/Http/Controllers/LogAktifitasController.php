<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\LogAktifitas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogAktifitasController extends Controller
{
    public function penjualanHari()
    {
        $model = LogAktifitas::whereDate('created_at', date('Y-m-d'))->paginate(10);
        $model1 = Antrian::whereDate('created_at', date('Y-m-d'))->sum('total_pembayaran');

        return response()->json([
            'status'  => "success",
            'message' => 'Log Aktifitas data has been found',
            'total'   => $model1,
            'data'    => $model,
        ]);
    }

    public function penjualanBulan()
    {
        $model = LogAktifitas::whereMonth('created_at', date('m'))->paginate(10);
        $model1 = Antrian::whereMonth('created_at', date('m'))->sum('total_pembayaran');

        return response()->json([
            'status'  => "success",
            'message' => 'Log Aktifitas data has been found',
            'total'   => $model1,
            'data'    => $model,
        ]);
    }

    public function penjualanTahun()
    {
        $model = LogAktifitas::whereYear('created_at', date('Y'))->paginate(10);
        $model1 = Antrian::whereYear('created_at', date('Y'))->sum('total_pembayaran');

        return response()->json([
            'status'  => "success",
            'message' => 'Log Aktifitas data has been found',
            'total'   => $model1,
            'data'    => $model,
        ]);
    }
}
