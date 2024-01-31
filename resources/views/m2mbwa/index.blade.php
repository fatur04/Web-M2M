@extends('layout.v_template')
@section('title', 'View M2M BWA')

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
    <form action="/m2mbwa/simpan" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title" id="exampleModalLabel">Tambah M2M</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
                <label class="col-form-label">M2M</label>
                <input type="text" name="nama_soltemp" class="form-control"  placeholder="M2M ..." autocomplete="off">
            </div>

            <div class="form-group">
                <label class="col-form-label">Nomor Jaringan</label>
                <input type="text" name="nojar_soltemp" class="form-control"  placeholder="Nomor Jaringan ..." autocomplete="off" required >
            </div>

            <div class="form-group">
                <label class="col-form-label">Pelanggan</label>
                <input type="text" name="pelanggan_soltemp" class="form-control"  placeholder="Pelanggan ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Nomor Kartu</label>
                <input type="text" name="nomor_soltemp" class="form-control"  placeholder="Nomor M2M ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Kuota</label>
                <input type="number" name="kuota" class="form-control"  placeholder="Kuota M2M ..." autocomplete="off" >
            </div>

            <div class="form-group">
                    <label for="lang">Status</label>
                    <select name="status" class="form-control">
                        <!-- <option value="Pending">Pending</option> -->
                        <option value="Sukses">Sukses</option>
                        <option value="On Progress">On Progress</option>
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

   <div class="table-responsive">
    <table class="table table-striped" id="table" width="100%">
        <thead>
            <tr>
                <th width="5px">No</th>
                <th width="50px">M2M</th>
                <th width="30px">Nomor Jaringan</th>
                <th width="70px">Pelanggan</th>
                <th width="50px">Nomor Kartu</th>
                <th width="20px">Kuota</th>
                <th width="30px">Status</th>
                <th width="50px">Tanggal</th>
                <th width="50px">Action</th>
                <!-- <th width="30px">Evidance Pengisian Kuota</th> -->

            </tr>
        </thead>
        <tbody>
            @foreach($datas as $index => $data)
                <tr>
                    <td id="id" data-id="{{ $data->id_soltemp }}">{{ $index + 1 }}</td>
                    <td id="soltemp">{{ $data->nama_soltemp }}</td>
                    <td id="nojar">{{ $data->nojar_soltemp }}</td>
                    <td id="pelanggan">{{ $data->pelanggan_soltemp }}</td>
                    <td id="nomor">{{ $data->nomor_soltemp }}</td>
                    <td>{{ $data->kuota }} Gb</td>
                    <td>
                        @if ($data->status === 'Sukses')
                            <span class="countdown" data-dismiss="{{ $data->id_soltemp }}" data-target="{{ $data->updated_at }}" id="{{ $data->status }}"></span>
                        @elseif ($data->status === 'On Progress')
                            <button class="btn btn-warning">On Progress</button>
                        @endif
                    </td>
                    <td id="tanggal">{{ $data->updated_at }}</td>
                    <td>
                        <a href="/m2mbwa/edit/{{ $data->id_soltemp }}" class="btn btn-warning fa fa-pencil-square-o" title="Edit"></a>
                        <a href="/m2mbwa/delete/{{ $data->id_soltemp }}" class="btn btn-danger remove-user fa fa-trash" title="Delete"></a>

                        <div class="modal fade" id="gambarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">Evidance Pengisian Kuota</h3>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('file_kuota/' . $data->foto_kuota) }}" width="200" height="400" alt="Gambar" class="img-center">
                                        <h5>Updated : {{ $data->updated_at }}</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-primary" data-toggle="modal" data-target="#gambarModal">Gambar</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

   </div>
  </div>
</div>
  <!-- /.box -->
<script src="{{asset('template')}}/jquery.min.js"></script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const countdownElements = document.querySelectorAll('.countdown');
            var id = $(this).data('data-dismiss');

            var soltemp = document.getElementById("soltemp").textContent;
            var pelanggan = document.getElementById("pelanggan").textContent;
            var nojar = document.getElementById("nojar").textContent;
            var nomor = document.getElementById("nomor").textContent;
            var tanggal = document.getElementById("tanggal").textContent;
            var id = document.getElementById("id").textContent;

            countdownElements.forEach(element => {
                const targetDate = new Date(element.getAttribute('data-target')).getTime();

                const interval = setInterval(function() {
                    const now = new Date().getTime();
                    const satuHari = 24 * 60 * 60 * 1000;

                    const timeRemaining = targetDate - now - satuHari;

                    if (timeRemaining <= 0 ) {
                        clearInterval(interval);
                        element.innerHTML = '<a class="btn btn-warning">Isi Kuotaku !</a> ';
                        kirimPesanWhatsApp(soltemp, pelanggan, nojar, nomor, tanggal);
                        updatestatus(id);

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

            function kirimPesanWhatsApp(soltemp, pelanggan, nojar, nomor, tanggal) {
            // Gantilah kode ini dengan logika untuk mengirim pesan WhatsApp
            // Anda dapat menggunakan WhatsApp API atau cara lain sesuai preferensi Anda
            //window.open(`http://localhost:3000/send-message?number=085161300036&message=testing, ${nama}! ${pesan}`);
            //alert(`Pesan WhatsApp terkirim ke ${nama} dengan isi pesan: ${pesan}`);
            var pesan = `*_This is BoT Whatsapp SEOA-BWA_*%0D%0A%0D%0A
Reminder Kuota M2M :%0D%0A
Nama M2M : *_${soltemp} ${pelanggan}_*%0D%0A
Nojar : *_${nojar}_*%0D%0A
Nomor M2M : *_${nomor}_*%0D%0A
Time Limit : *_${tanggal}_*%0D%0A%0D%0A
*_Powered by Fatur SEOA_*
                          `;

            fetch(`http://localhost:3000/send-Message?number&message=${pesan}`)
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

    function updatestatus(id) {
        // Kirim permintaan ke server dengan menggunakan AJAX atau Fetch API
        fetch(`/soltemp/update-status/${id}`, {
                method: "GET", // Atau metode HTTP yang sesuai
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}", // Jika Anda menggunakan Laravel dengan CSRF protection
                    "Content-Type": "application/json"
                },
            })
            .then(response => response.json())
            .then(data => {
                // // Handle respons dari server jika diperlukan
                // if (data.success) {
                //     alert("Status berhasil diubah!");
                //     // Refresh atau lakukan tindakan lain pada tampilan jika diperlukan
                // } else {
                //     alert("Gagal mengubah status.");
                // }
            })
            .catch(error => {
                console.error("Terjadi kesalahan: " + error);
            });

    }

    </script>

<script>
    $(document).ready(function() {
    $("body").on("click",".remove-user",function(event){
            event.preventDefault();
            var current_object = $(this);
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "error",
                showCancelButton: true,
                dangerMode: true,
                cancelButtonClass: '#DD6B55',
                confirmButtonColor: '#dc3545',
                confirmButtonText: 'Delete!',
            },function (result) {
                if (result) {
                    var action = current_object.attr('href');
                    var token = jQuery('meta[name="csrf-token"]').attr('content');
                    var id = current_object.attr('data-id');

                    $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
                    $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
                    $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
                    $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
                    $('body').find('.remove-form').submit();
                }
            });
        });
    });
</script>

@endsection
