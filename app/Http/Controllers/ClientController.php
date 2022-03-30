<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use App\Models\Kamar;
use App\Models\TipeKamar;
use App\Models\Client;
use App\Models\Fasilitas;
use App\Models\Reservasi;

class ClientController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        $kamar = Kamar::all();
        $tipeKamar = TipeKamar::all();
        return view('index', compact('kamar', 'tipeKamar', 'fasilitas'));
    }

    public function tipe($id){
        $tipeKamar = TipeKamar::all();
        $kamar = Kamar::where('id_tipe', $id)->get();
        return view('tipe', compact('kamar', 'tipeKamar', 'id'));
    }

    public function showReservationForm(Request $request)
    {
        $request->validate([
            'mulai' => 'required',
            'selesai' => 'required',
            'kamar' => 'required',
            'tipe' => 'required',
        ]);
        
        $req = $request->all();
        return view('pesan', compact('req'));
    }

    public function reservation(Request $request)
    {
        $uuid = Str::uuid();
        // $request->validate([
        //     'nama' => 'required',
        //     'email' => 'required',
        //     'telepon' => 'required',  
        //     'mulai' => 'required',
        //     'selesai' => 'required',
        // ]);
        
        $hargaTipe = TipeKamar::find($request->tipe)->harga;
        $mulai = Carbon::parse($request->mulai);
        $selesai = Carbon::parse($request->selesai);
        $jumlahKamar = sizeof($request->kamar);
  
        $interval = $mulai->diffInDays($selesai);
        
        $harga_total = $interval * $hargaTipe * $jumlahKamar;

        DB::beginTransaction();

        try{
            $idClient = Client::insertGetId([
                'nama' => $request->nama,
                'email' => $request->email,
                'telepon' => $request->telepon,
            ]);
    
            foreach($request->kamar as $kamar) {
                Reservasi::insert([
                    'id_client' => $idClient,
                    'id_kamar' => $kamar,
                    'mulai' => $request->mulai,
                    'selesai' => $request->selesai,
                    'harga_total' => $harga_total,
                    'token' => $uuid,
                    'status' => 'diproses',
                ]);
    
                Kamar::where('id', $kamar)->update([
                    'dipesan' => 1,
                ]);
            }

            DB::commit();
        }catch(\Exception $e){
            dd($e);
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal melakukan reservasi');
        }
        
        return redirect("/reservasi/$uuid");
    }

    public function receipt($reservasi)
    {
        $reservasi = Reservasi::where('token', $reservasi)->get();
        $jumlahKamar = sizeof($reservasi);

        return view('receipt', compact('reservasi', 'jumlahKamar'));
    }
}