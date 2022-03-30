@extends('layout.clientLayout')

@section('title', 'Hotel Zaharis')    

@section('main')    
<section id="home-tipe" class="container-fluid">
    <div class="row h-100 align-items-center">
        <div class="col-5">
            <h1>Buat Liburanmu Menjadi Lebih Menyenangkan</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa voluptatem nemo modi molestias
                dignissimos ipsum.</p>
        </div>
    </div>
</section>

<section id="pesan">
    <form action="/kamar/pesan">
        <div class="container">
            <div class="row justify-content-center position-sticky">
                <div class="col-12">
                    <div class="card-pesan shadow bg-white">
                        <div class="py-5 px-5 d-flex justify-content-center">
                            <div class="select me-3">
                                <label for="mulai" class="ms-2">Tipe Kamar</label>
                                <select style="border: 0" name="tipe" class="form-control frm" id="floatingInput" onchange="location = this.value">
                                    <option value="" disabled selected hidden >-Pilih Tipe-</option>
                                    @foreach($tipeKamar as $item)
                                    <option @if ($item->id == $id) value="{{ $item->id }}"  selected @endif value="/tipe-kamar/{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="select me-3">
                                <label for="mulai" class="ms-2">Tanggal Mulai</label>
                                <input type="date" class="form-control date" name="mulai" id="exampleDatepicker1" />
                            </div>
                            <div class="select me-3">
                                <label for="mulai" class="ms-2">Tanggal Selesai</label>
                                <input type="date" class="form-control date" name="selesai"
                                    id="exampleDatepicker1" />
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
                        <div class="col-6 ">
                            <div class="card mb-3 shadow" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4 gambar-wrapper">
                                        <img src="{{ asset('images/kamar/'.$item->gambar) }}"
                                            class="img-kamar rounded-start" alt="Kamar">
                                    </div>
                                    <div class="col-md-8 card-text">
                                        <div class="card-body">
                                            <div class="wrapper">
                                                <h5 class="card-title"><em>{{ $item->tipe->nama }}</em> </h5>
                                                <label class="card-text nomor-kamar"><small class="text-muted">No.
                                                        {{ $item->nomor }}</small></label>
                                                <p class="card-text">{{ $item->deskripsi }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <strong>Rp. {{ $item->tipe->harga }}/malam</strong>
                                                <div>
                                                    <input type="checkbox"  class="btn-check" id="btn-check-{{ $loop->iteration }}" name="kamar[]" value="{{ $item->id }}">
                                                    <label class="btn btn-primary" for="btn-check-{{ $loop->iteration }}">Pesan</label>
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

@push('script')
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Mohon isi tanggal dan pilih kamar dengan benar',
            })
        </script>
    @endif
@endpush
