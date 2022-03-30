@extends('layout.adminLayout')

@section('title', 'Admin -Tambah Kamar')

@section('main')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Kamar</h3>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-2">
                        <label>Nomor Kamar</label>
                    </div>
                    <div class="col-md-10 form-group">
                        <p>{{ $kamar->nomor }}</p>
                    </div>
                    <div class="col-md-2">
                        <label>Harga Kamar</label>
                    </div>
                    <div class="col-md-10 form-group">
                        <p>{{ $kamar->tipe->harga }}</p>
                    </div>
                    <div class="col-md-2">
                        <label>Tipe Kamar</label>
                    </div>
                    <div class="col-md-10 form-group">
                        <p>{{ $kamar->tipe->nama }}</p>
                    </div>
                    <div class="col-md-2">
                        <label>Deskripsi</label>
                    </div>
                    <div class="col-md-10 form-group">
                        <p>{{ $kamar->deskripsi }}</p>
                    </div>
                    <div class="col-md-2">
                        <label>Gambar</label>
                    </div>
                    <div class="col-md-10 form-group">
                        <img src="{{ asset("images/kamar/$kamar->gambar") }}" alt="Kamar" height="128" >
                    </div>

                    <div class="col-sm-12 d-flex justify-content-center gap-2">
                        <form action="" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger me-1 mb-1">Hapus</button>
                        </form>
                        <a href="/admin/kamar/{{ $kamar->id }}/edit" class="btn btn-info me-1 mb-1">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
