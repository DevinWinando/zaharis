@extends('layout.adminLayout')

@section('title', 'Admin - Edit Tipe Kamar')

@section('main')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Tipe Kamar</h3>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" method="post" action="/admin/tipe-kamar/{{ $tipeKamar->id }}"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-2">
                        <label>Nama</label>
                    </div>
                    <div class="col-md-10 form-group">
                        <input type="text" id="first-name" class="form-control" value="{{ $tipeKamar->nama }}" name="nama" placeholder="Nama" />
                    </div>
                    <div class="col-md-2">
                        <label>Harga</label>
                    </div>
                    <div class="col-md-10 form-group">
                        <input value="{{ $tipeKamar->harga }}" type="number" id="first-name" class="form-control" name="harga" placeholder="Harga" />
                    </div>
                    <div class="col-sm-12 d-flex justify-content-end mt-3">
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
