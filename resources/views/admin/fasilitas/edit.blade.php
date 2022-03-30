@extends('layout.adminLayout')

@section('title', 'Admin - Tambah Kamar')

@section('main')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambahkan Kamar</h3>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" method="post" action="/admin/fasilitas/{{ $fasilitas->id }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Nama</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <input type="text" id="first-name" class="form-control" name="nama"
                                placeholder="Nama" value="{{ $fasilitas->nama }}" />
                        </div>
                        <div class="col-md-2">
                            <label>Deskripsi</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"
                                style="height: 60px;">{{ $fasilitas->deskripsi }}</textarea>
                        </div>
                        <div class="col-md-2">
                            <label>Gambar</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <img src="{{ asset("images/fasilitas/$fasilitas->gambar") }}" alt="fasilitas" height="128" >
                            <input class="form-control mt-2" type="file" id="formFile" name="gambar">
                            <input class="form-control" type="hidden" id="formFile" name="gambarLama" value="{{ $fasilitas->gambar }}">
                        </div>

                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
