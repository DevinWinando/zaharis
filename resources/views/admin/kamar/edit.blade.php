@extends('layout.adminLayout')

@section('title', 'Admin - Edit Kamar')

@section('main')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Kamar</h3>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" method="post" action="/admin/kamar/{{ $kamar->id }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Nomor Kamar</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <input type="text" id="first-name" class="form-control" value="{{ $kamar->nomor }}" name="nomor"
                                placeholder="Nomor Kamar" />
                        </div>
                        <div class="col-md-2">
                            <label>Tipe Kamar</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <select name="tipe" class="form-control frm" id="floatingInput">
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
                                style="height: 60px;">{{ $kamar->deskripsi }}</textarea>
                        </div>
                        <div class="col-md-2">
                            <label>Gambar</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <img src="{{ asset("images/kamar/$kamar->gambar") }}" alt="Kamar" height="128" >
                            <input class="form-control mt-2" type="file" id="formFile" name="gambar">
                            <input class="form-control" type="hidden" id="formFile" name="gambarLama" value="{{ $kamar->gambar }}">
                        </div>

                        <div class="col-sm-12 d-flex justify-content-end mt-3">
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
