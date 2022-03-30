<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaharis</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/kwitansi.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/js/bootstrap.min.js') }}"> --}}
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    -->
    <script src="https://kit.fontawesome.com/604c789c41.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        {{-- href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"> --}}
</head>

<body>
    <div>
        <div class="header p-4 mx-4">
            <h2>Zaharis</h2>
        </div>
        <div class="kwitansi mx-4">
            <div class="atas px-5 py-5 d-flex justify-content-between">
                <div class="nama float-left">
                    <h3 class="text-black-50">Client</h3>
                    <h2>{{ $reservasi[0]->client->nama }}</h2>
                </div>
                <div class="d-flex logo2 float-right tex-right align-self-end">
                    <div class="kanan text-end">
                        <h3 class="text-black-50">Jumlah Kamar</h3>
                        <h2 class="align right">{{ $jumlahKamar }}</h2>
                    </div>
                </div>
            </div>
            <div class="tengah px-5 py-5">
                <div class="mb-5 d-flex justify-content-between">
                    <div class="kiri">
                        <h3 class="text-black-50">Check In</h3>
                        <h2>{{ $reservasi[0]->mulai }}</h2>
                    </div>
                    <div class="kanan">
                        <h3 class="text-black-50 text-end">Check Out</h3>
                        <h2>{{ $reservasi[0]->selesai }}</h2>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="kiri col-4">
                        <h3 class="text-black-50">Jenis Room</h3>
                        <h2>{{ $reservasi[0]->kamar->tipe->nama }}</h2>
                    </div>
                    <div class="kanan col text-end">
                        <h3 class="text-black-50 ">Harga Total</h3>
                        <h2>{{ $reservasi[0]->harga_total }}</h2>
                    </div>
                </div>
            </div>
            <div class="bawah px-5 py-5">
                <p class="">
                    Terima kasih telah memesan di Zaharis Hotel. Mohon simpan halaman ini sebagai bukti pemesanan dan diharapkan untuk datang 30 menit sebelum check in untuk melakukan pembayaran di tempat.
                </p>
            </div>
        </div>
    </div>

    <script>
        (() => window.print())()
    </script>
</body>

</html>
