<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipeKamar;

class TipeKamarController extends Controller
{
    public function index()
    {
        $tipeKamar = TipeKamar::all();

        return view('admin.tipeKamar.index', compact('tipeKamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipeKamar = TipeKamar::all();
        return view('admin.kamar.create', compact('tipeKamar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

        TipeKamar::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
        ]);

        return redirect('/admin/tipe-kamar')->with('addSuccess', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TipeKamar $tipeKamar)
    {
        return view('admin.kamar.detail', compact('tipeKamar'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipeKamar $tipeKamar)
    {
        return view('admin.tipeKamar.edit', compact('tipeKamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

        TipeKamar::where('id', $id)->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
        ]);

        return redirect('/admin/tipe-kamar')->with('updateSuccess', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipeKamar::where('id', $id)->delete();

        return redirect('admin/tipe-kamar')->with('deleteSuccess', 'Data Berhasil Dihapus');
    }
}