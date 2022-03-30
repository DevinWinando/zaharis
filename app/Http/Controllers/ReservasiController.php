<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Reservasi;
use App\Models\Kamar;

class ReservasiController extends Controller
{
    public function index(){
        $reservasi = Reservasi::all();

        return view('resepsionis.reservasi.index', compact('reservasi'));
    }

    public function proses(Request $request){
        $status = $request->status;
        
        DB::beginTransaction();
        try{
            Reservasi::where('id', $request->idReservasi)->update([
                'status' => $status
            ]);

            if($status == 'diproses' || $status == 'dipesan'){
                Kamar::where('id', $request->idKamar)->update([
                    'dipesan' => 1
                ]);
            }else{
                Kamar::where('id', $request->idKamar)->update([
                    'dipesan' => 0
                ]);
            }
            DB::commit();
        }catch(\Exception $e){
            dd($e);
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal proses reservasi');
        }

        return redirect('resepsionis/reservasi')->with('success', 'Berhasil proses reservasi');
    }
}