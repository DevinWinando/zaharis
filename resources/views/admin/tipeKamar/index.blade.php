@extends('layout.adminLayout')

@section('title', 'Admin - Tipe Kamar')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/admin/kamar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}" />
@endpush

@section('main')
<div class="d-flex justify-content-between">
    <h3>Data Kamar</h3>
    <div>
        <button class="btn btn-primary d-print-none" onclick="window.print()">Print</button>
        <button class="btn btn-primary d-print-none" data-bs-toggle="modal" data-bs-target="#primary">Tambahkan</button>
    </div>
</div>
<div class="table-responsive mt-4">
    <table class="table table-borderless table-hover" id="tabel-reservasi">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th class="d-print-none">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipeKamar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-bold-500">{{ $item->nama }}</td>
                    <td>{{ $item->harga }}</td>
                    <td class="d-print-none">
                        <div class="d-flex gap-2">
                            <form action="/admin/tipe-kamar/{{ $item->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn link-light badge bg-danger">Hapus</button>
                            </form>
                            <a href="/admin/tipe-kamar/{{ $item->id }}/edit" class="badge bg-info link-light">Edit</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!--primary theme Modal -->
<div class="modal fade text-left" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel160">Tambahkan Data
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Nama</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <input type="text" id="first-name" class="form-control" name="nama" placeholder="Nama" />
                        </div>
                        <div class="col-md-2">
                            <label>Harga</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <input type="text" id="first-name" class="form-control" name="harga" placeholder="Harga" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tambah</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')

    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        const tabel = document.querySelector('#tabel-reservasi');
        const dataTable = new simpleDatatables.DataTable(tabel)

    </script>

    @if(session('addSuccess'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('addSuccess') }}',
            })

        </script>
    @endif

    @if(session('updateSuccess'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('updateSuccess') }}',
            })

        </script>

    @endif

    @if(session('deleteSuccess'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('deleteSuccess') }}',
            })

        </script>
    @endif
@endpush
