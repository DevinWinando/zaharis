@extends('layout.adminLayout')

@section('title', 'Admin - Kamar')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/admin/kamar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}" />
@endpush

@section('main')
<div class="d-flex justify-content-between">
    <h3>Data Kamar</h3>
    <div>
        <button class="btn btn-primary d-print-none" onclick="window.print()">Print</button>
        <a class="btn btn-primary d-print-none" href="/admin/kamar/create">Tambahkan</a>
    </div>
</div>
<div class="table-responsive mt-4">
    <table class="table table-borderless table-hover" id="tabel-reservasi">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Status</th>
                <th class="d-print-none">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kamar as $item)
                <tr>
                    <td>{{ $item->nomor }}</td>
                    <td class="text-bold-500">{{ $item->tipe->nama }}</td>
                    <td>{{ $item->tipe->harga }}</td>
                    @if ($item->dipesan == 0)
                        <td class="text-bold-500">
                            <div class="badge bg-success">Tersedia</div>    
                        </td>    
                    @else
                        <td class="text-bold-500">
                            <div class="badge bg-secondary">Dipesan</div>    
                        </td>
                    @endif
                    <td class="d-print-none">
                        <a href="/admin/kamar/{{ $item->id }}" class="badge bg-primary link-light">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('script')
    <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        const tabel = document.querySelector('#tabel-reservasi');
        const dataTable = new simpleDatatables.DataTable(tabel)
    </script>
    
    @if (session('addSuccess'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('addSuccess') }}',
            })
        </script>
    @endif

    @if (session('updateSuccess'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('updateSuccess') }}',
            })
        </script>
        
    @endif

    @if (session('deleteSuccess'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('deleteSuccess') }}',
            })
        </script>
    @endif
@endpush
