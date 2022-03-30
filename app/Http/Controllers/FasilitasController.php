<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fasilitas;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();

        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fasilitas.create');
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
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $imageName = time().'_'.$request->file('gambar')->getClientOriginalName();

        $request->gambar->move(public_path('images/fasilitas'), $imageName);

        Fasilitas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
        ]);

        return redirect('/admin/fasilitas')->with('addSuccess', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fasilitas)
    {
        $fasilitas = Fasilitas::find($fasilitas);
        return view('admin.fasilitas.detail', compact('fasilitas'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($fasilitas)
    {
        $fasilitas = Fasilitas::find($fasilitas);
        return view('admin.fasilitas.edit', compact('fasilitas'));
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
            'deskripsi' => 'required',
            'gambarLama' => 'required',
        ]);
        

        $imageName = $request->gambarLama;

        if($request->hasFile('gambar')){
            $imageName = time().'_'.$request->file('gambar')->getClientOriginalName();
            
            $request->gambar->move(public_path('images/Fasilitas'), $imageName);
        }

        Fasilitas::where('id', $id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
        ]);

        return redirect('/admin/fasilitas')->with('updateSuccess', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fasilitas::where('id', $id)->delete();

        return redirect('admin/fasilitas')->with('deleteSuccess', 'Data Berhasil Dihapus');
    }
}