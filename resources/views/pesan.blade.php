@extends('layout.clientLayout')

@section('title', 'Hotel Zaharis - Pesan')    

@section('main')
<section id="pesan" style="min-height: 79vh" class="d-flex justify-content-center align-items-center">
    <form action="/kamar/pesan{{-- /$kamar->id --}}" method="post">
        @csrf
        <input type="hidden" name="mulai" value="{{ $req['mulai'] }}">
        <input type="hidden" name="selesai" value="{{ $req['selesai'] }}">
        <input type="hidden" name="tipe" value="{{ $req['tipe'] }}">
        @foreach ($req['kamar'] as $kamar)
        <input type="hidden" name="kamar[]" value="{{ $kamar }}">
        @endforeach

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-9">
                    <div class="card card-biodata shadow-lg mt-5" id="biodata">
                        <div class="card-header">
                            <h3 class="card-title text-center">Masukkan Biodatamu</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nama Lengkap</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="first-name" class="form-control" name="nama"
                                            placeholder="Nama" />
                                    </div>
                                    <div class="col-md-4">
                                        <label>No. Telepon</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="tel" id="email-id" class="form-control" name="telepon"
                                            placeholder="Nomor Telepon" />
                                    </div>
                                    <div class="col-md-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="email" id="email-id" class="form-control" name="email"
                                            placeholder="Email" />
                                    </div>

                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
