@extends('layout.clientLayout')

@section('title', 'Hotel Zaharis')

@section('main')
<section id="home" class="container-fluid">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('/images/hotel.jpg') }}" style="height: 70vh; object-fit:cover;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="margin-top: -20rem">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            @foreach ($fasilitas as $item)
            <div class="carousel-item">
                <img src="{{ asset("/images/fasilitas/$item->gambar") }}" style="height: 70vh; object-fit:cover;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style="margin-top: -20rem">
                    <h5>{{ $item->nama }}</h5>
                    <p>{{ $item->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</section>

<section id="pesan">
    <form action="kamar/pesan">
        <div class="container">
            <div class="row justify-content-center position-sticky">
                <div class="col-12">
                    <div class="card-pesan shadow bg-white">
                        <div class="py-5 px-5 d-flex justify-content-center">
                            <div class="select me-3">
                                <label for="mulai" class="ms-2">Tipe Kamar</label>
                                <select name="tipe" class="form-control frm" style="border: 0" id="floatingInput"
                                    onchange="location = this.value">
                                    <option value="" selected disabled hidden>-Pilih Tipe-</option>
                                    @foreach($tipeKamar as $item)
                                    <option value="/tipe-kamar/{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="select me-3">
                                <label for="mulai" class="ms-2">Tanggal Mulai</label>
                                <input type="date" class="form-control date" name="mulai" id="exampleDatepicker1" />
                            </div>
                            <div class="select me-3">
                                <label for="mulai" class="ms-2">Tanggal Selesai</label>
                                <input type="date" class="form-control date" name="selesai" id="exampleDatepicker1" />
                            </div>
                            <button type="submit" class="btn btn-primary align-self-center py-2"
                                href="#biodata">Selanjutnya</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <h1>Pesan Kamar</h1>
                </div>
            </div>

            <div class="row mt-4">
                @foreach($kamar as $item)
                @if($item->dipesan == 0)
                <div class="col-6">
                    <div class="card mb-3 shadow" style="max-width: 540px">
                        <div class="row g-0">
                            <div class="col-md-4 gambar-wrapper">
                                <img src="{{ asset('images/kamar/'.$item->gambar) }}" class="img-kamar rounded-start"
                                    alt="Kamar" />
                            </div>
                            <div class="col-md-8 card-text">
                                <div class="card-body">
                                    <div class="wrapper">
                                        <h5 class="card-title"><em>{{ $item->tipe->nama }}</em></h5>
                                        <label class="card-text nomor-kamar"><small class="text-muted">No.
                                                {{ $item->nomor }}</small></label>
                                        <p class="card-text">{{ $item->deskripsi }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <strong>Rp. {{ $item->tipe->harga }}/malam</strong>
                                        <div>
                                            <button class="btn btn-primary" disabled>Piilh</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </form>
</section>
@endsection
