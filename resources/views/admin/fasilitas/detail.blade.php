@extends('layout.adminLayout')

@section('title', 'Admin - Tambah Kamar')

@section('main')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambahkan Kamar</h3>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-2">
                        <label>Nama</label>
                    </div>
                    <div class="col-md-10 form-group">
                        <p>{{ $fasilitas->nama }} </p>
                    </div>
                    <div class="col-md-2">
                        <label>Deskripsi</label>
                    </div>
                    <div class="col-md-10 form-group">
                        <p>{{ $fasilitas->deskripsi }} </p>
                    </div>
                    <div class="col-md-2">
                        <label>Gambar</label>
                    </div>
                    <div class="col-md-10 form-group">
                        <img src="{{ asset("images/fasilitas/$fasilitas->gambar") }}" alt="Kamar" height="128">
                    </div>
                    <div class="col-sm-12 d-flex justify-content-center">
                        <form action="/admin/fasilitas/{{ $fasilitas->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger me-1 mb-1">Hapus</button>
                        </form>
                        <a href="/admin/fasilitas/{{ $fasilitas->id }}/edit" class="btn btn-info me-1 mb-1">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
