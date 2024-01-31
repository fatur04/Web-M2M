@extends('layout.v_template')
@section('title', 'View ISR')

<script src="{{asset('template')}}/jquery.min.js"></script>
</head>
<body>

<style>
    .table td, .table th {
        font-size: 12px;
    }
</style>

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
    <form action="/isr/simpan" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Tambah ISR</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="col-form-label">Nama Stasiun</label>
                <input type="text" name="nama_stasiun" class="form-control"  placeholder="Nama Stasiun ..." autocomplete="off">
            </div>

            <div class="form-group">
                <label class="col-form-label">Perangkat</label>
                <input type="text" name="perangkat" class="form-control"  placeholder="Perangkat RL ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Frekuensi TX</label>
                <input type="text" name="frekuensi_rx" class="form-control"  placeholder="Frekuensi TX ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Frekuensi RX</label>
                <input type="text" name="frekuensi_tx" class="form-control"  placeholder="Frekuensi RX ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Periode Awal</label>
                <input type="date" name="period_awal" class="form-control"  placeholder="Periode Awal ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Periode Akhir</label>
                <input type="date" name="period_akhir" class="form-control"  placeholder="Periode Akhir ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">BHP</label>
                <input type="text" name="bhp" class="form-control"  placeholder="BHP ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Site ID</label>
                <input type="text" name="siteid" class="form-control"  placeholder="Site ID ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">ISR</label>
                <input type="text" name="isr" class="form-control"  placeholder="ISR ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">PSB User</label>
                <input type="text" name="psb_user" class="form-control"  placeholder="PSB User ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">PSB Kemitraan</label>
                <input type="text" name="psb_kemitraan" class="form-control"  placeholder="PSB Kemitraan ..." autocomplete="off" >
            </div>

            <!-- <div class="form-group">
                    <label for="lang">Status</label>
                    <select name="status" class="form-control">
                        <option value="Pending">Pending</option>
                        <option value="Sukses">Sukses</option>
                        <option value="Isi Kuotaku !">Isi Kuotaku !</option>
                    </select>
            </div> -->

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
                <th class="col-md-auto">No</th>
                <th class="col-md-auto">Action</th>
                <th class="col-md-auto">Nama Stasiun</th>
                <th class="col-md-auto">Perangkat</th>
                <th class="col-md-auto">Frekuensi TX</th>
                <th class="col-md-auto">Frekuensi RX</th>
                <th class="col-md-auto">Periode Awal</th>
                <th class="col-md-auto">Periode Akhir</th>
                <th class="col-md-auto">BHP</th>
                <th class="col-md-auto">Site ID</th>
                <th class="col-md-auto">ISR</th>
                <th class="col-md-auto">PSB User</th>
                <th class="col-md-auto">PSB Kemitraan</th>
                <th class="col-md-auto">Updated At</th>

            </tr>
        </thead>
        <tbody>
            @foreach($datas as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <a href="/isr/edit/{{ $data->no_isr }}" class=" fa fa-pencil-square-o fa-sm" style="color: orange" title="Edit"></a>
                        <a href="/isr/delete/{{ $data->no_isr }}" class="remove-user fa fa-trash fa-sm" style="color: red" title="Delete"></a>
                    </td>
                    <td>{{ $data->nama_stasiun }}</td>
                    <td>{{ $data->perangkat }}</td>
                    <td>{{ $data->frekuensi_tx }}</td>
                    <td>{{ $data->frekuensi_rx }}</td>
                    <td>{{ $data->period_awal }}</td>
                    <td>{{ $data->period_akhir }}</td>
                    <td>{{ $data->bhp }}</td>
                    <td>{{ $data->siteid }}</td>
                    <td>{{ $data->isr }}</td>
                    <td>{{ $data->psb_user }}</td>
                    <td>{{ $data->psb_kemitraan }}</td>
                    <td>{{ $data->updated_at }}</td>
                </tr>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus data ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="/isr/delete/{{ $data->no_isr }}" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>


            @endforeach
        </tbody>
    </table>

   </div>
</div>
    <!-- /.box-body -->
</div>


<script src="{{asset('template')}}/jquery.min.js"></script>
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
