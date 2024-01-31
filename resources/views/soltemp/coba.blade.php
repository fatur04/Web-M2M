@extends('layout.v_template')
@section('title', 'View Soltemp')

<script src="{{asset('template')}}/jquery.min.js"></script>
</head>
<body>

<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable();
} );
</script>

@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Tambah</button>

<div class="box">

<!-- Modal Add -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
    <form action="/soltemp/simpan/" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Tambah M2M</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
                <label class="col-form-label">M2M</label>
                <input type="text" name="nama_soltemp" class="form-control"  placeholder="Soltemp ..." autocomplete="off">
            </div>

            <div class="form-group">
                <label class="col-form-label">Nomor Jaringan</label>
                <input type="text" name="nojar_soltemp" class="form-control"  placeholder="Nomor Jaringan ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Pelanggan</label>
                <input type="text" name="pelanggan_soltemp" class="form-control"  placeholder="Pelanggan ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Nomor Kartu</label>
                <input type="text" name="nomor_soltemp" class="form-control"  placeholder="Nomor Soltemp ..." autocomplete="off" >
            </div>

            <div class="form-group">
                    <label for="lang">Status</label>
                    <select name="status" class="form-control">
                        <option value="Pending">Pending</option>
                        <option value="Sukses">Sukses</option>
                        <option value="Isi Kuotaku !">Isi Kuotaku !</option>
                    </select>
            </div>

            <div class="form-group">
                <label class="col-form-label">Tanggal</label>
                <input type="datetime-local" name="updated_at" class="form-control" autocomplete="off" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
    </div>
  </div>

    <!-- /.box-header -->
    <div class="box-body">
        @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i>Success</h4>
            {{ session('pesan') }}.
        </div>
    @endif

    <!-- <form action="/soltemp/" method="GET">
            <div class="form-group">
                <label for="search">Search:</label>
                <input type="text" class="form-control" name="query" placeholder="Search ...">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Tambah</button>
    </form> -->

   <div class="table-responsive">
    <table class="table table-striped" id="table" width="100%">
        <thead>
            <tr>
                <th width="5px">No</th>
                <th width="50px">Soltemp</th>
                <th width="30px">Nomor Jaringan</th>
                <th width="70px">Pelanggan</th>
                <th width="50px">Nomor Kartu</th>
                <th width="30px">Status</th>
                <th width="50px">Tanggal</th>
                <th width="30px">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($datas as $index => $data)
                <tr>
                    <td class="idlink" data-id="{{ $data->id }}">{{ $index + 1 }}</td>
                    <td id="soltemp">{{ $data->nama_soltemp }}</td>
                    <td>{{ $data->nojar_soltemp }}</td>
                    <td>{{ $data->pelanggan_soltemp }}</td>
                    <td>{{ $data->nomor_soltemp }}</td>
                    <td>
                        @if ($data->status === 'Pending')
                            <span class="countdown" data-dismiss="{{ $data->id_soltemp }}" data-target="{{ $data->updated_at }}" data-id="{{ $data->status }}"></span>
                        @elseif ($data->status === 'Sukses')
                            <button class="btn btn-success" id="countdown">Sukses</button>
                        @endif
                    </td>
                    <td>{{ $data->updated_at }}</td>
                    <td>
                        <a href="/soltemp/edit/{{ $data->id_soltemp }}" class="btn btn-warning fa fa-pencil-square-o" title="Edit"></a>
                        <a href="/soltemp/delete/{{ $data->id_soltemp }}" class="btn btn-danger remove-user fa fa-trash" title="Delete"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

   </div>
</div>
    <!-- /.box-body -->
</div>
  <!-- /.box -->
<script src="{{asset('template')}}/jquery.min.js"></script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const countdownElements = document.querySelectorAll('.countdown');
            var countdownId = $(this).data('data-dismiss');

            countdownElements.forEach(element => {
                const targetDate = new Date(element.getAttribute('data-target')).getTime();
                const soltemp = document.getElementById('soltemp').value;

                const interval = setInterval(function() {
                    const now = new Date().getTime();
                    const timeRemaining = targetDate - now;

                    if (timeRemaining <= 0) {
                        clearInterval(interval);
                        kirimPesanWhatsApp(soltemp);

                    } else {
                        // const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
                        // element.innerHTML = `${seconds} detik`;
                        const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                        const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                        const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                        element.innerHTML = `${days} hari ${hours} jam ${minutes} menit ${seconds} detik`;

                    }
                }, 1000);
            });

            function kirimPesanWhatsApp(soltemp) {
            // Gantilah kode ini dengan logika untuk mengirim pesan WhatsApp
            // Anda dapat menggunakan WhatsApp API atau cara lain sesuai preferensi Anda
            //window.open(`http://localhost:3000/send-message?number=085161300036&message=testing, ${nama}! ${pesan}`);
            //alert(`Pesan WhatsApp terkirim ke ${nama} dengan isi pesan: ${pesan}`);

            fetch(`http://localhost:3000/send-message?number=085161300036&message=${soltemp}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Terjadi kesalahan dalam permintaan.');
                }
                return response.text();
            })
            .then(data => {
                // Lakukan tindakan yang diperlukan dengan data yang diterima
                console.log(data); // Contoh: Tampilkan data di konsol
            })
            .catch(error => {
                console.error('Kesalahan:', error);
            });
        }
    });
    </script>

@endsection
