@extends('layout.adminLayout')

@section('title', 'Admin - Tambah Kamar')

@section('main')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambahkan Kamar</h3>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" method="post" action="/admin/kamar" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Nomor Kamar</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <input type="number" id="first-name" class="form-control" name="nomor"
                                placeholder="Nomor Kamar" />
                        </div>
                        <div class="col-md-2">
                            <label>Tipe Kamar</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <select name="tipe" class="form-control frm" id="floatingInput">
                                <option value="" disabled selected hidden >-Pilih Tipe-</option>
                                @foreach($tipeKamar as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Deskripsi</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"
                                style="height: 60px;"></textarea>
                        </div>
                        <div class="col-md-2">
                            <label>Gambar</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <input class="form-control" type="file" id="formFile" name="gambar">
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
