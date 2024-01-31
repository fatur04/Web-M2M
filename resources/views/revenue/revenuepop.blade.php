@extends('layout.v_template')
@section('title', 'REVENUE POP SEOA')

<script src="{{asset('template')}}/jquery.min.js"></script>
<body>

<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable();
} );
</script>
@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Tambah</button>
  <div class="box">

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
    <form action="/revenue/simpan" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h3>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="col-form-label">POP</label>
                <input type="text" name="pop" class="form-control"  placeholder="POP ..." autocomplete="off" required>
            </div>

            <div class="form-group">
                <label class="col-form-label">Node</label>
                <input type="text" name="node" class="form-control"  placeholder="Node ..." autocomplete="off" required>
            </div>

            <div class="form-group">
                <label class="col-form-label">Nomor Jaringan</label>
                <input type="text" name="nojar" class="form-control"  placeholder="Nomor Jaringan ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Pelanggan</label>
                <input type="text" name="pelanggan" class="form-control"  placeholder="Pelanggan ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Revenue</label>
                <input type="text" name="revenue" id="dengan-rupiah" class="form-control"  placeholder="Revenue ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Port</label>
                <input type="text" name="port" class="form-control"  placeholder="Port ..." autocomplete="off" >
            </div>

            <div class="form-group">
                    <label for="lang">Status</label>
                    <select name="status" class="form-control">
                        <option value="UP">UP</option>
                        <option value="DOWN">DOWN</option>
                        <option value="REGISTERED">REGISTERED</option>
                    </select>
            </div>

            <!-- <div class="form-group">
                <label class="col-form-label">Tanggal</label>
                <input type="date" name="updated_at" class="form-control" autocomplete="off" required>
            </div> -->
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

    <h3>Total Revenue POP {{ $pop }} : Rp. {{ ($totalrupiah) }} </h3>

    <div class="table-responsive">
    <table class="table table-striped" id="table" width="100%">
        <thead>
            <tr>
                <th width="10px">No</th>
                <th width="100px">Node</th>
                <th width="100px">Nojar</th>
                <th width="150px">Pelanggan</th>
                <th width="100px">Revenue</th>
                <th width="40px">Port</th>
                <th width="70px">Status</th>
                <th width="80px">Update</th>
                <th width="80px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->node }}</td>
                    <td>{{ $data->nojar }}</td>
                    <td>{{ $data->pelanggan }}</td>
                    <td>{{ $data->revenue }}</td>
                    <td>{{ $data->port }}</td>
                    <td>{{ $data->status }}</td>
                    <td>{{ $data->updated_at }}</td>
                    <td>
                        <a href="/revenue/edit/{{ $data->id_revenue }}" class="btn btn-warning fa fa-pencil-square-o" title="Edit"></a>
                        <a href="/revenue/delete/{{ $data->id_revenue }}" class="btn btn-danger remove-user fa fa-trash" title="Delete"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/revenue_allpop" type="button" class="btn btn-success">Back</a>

   </div>
</div>

</div>
  <!-- /.box -->

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

  <!-- <script type="text/javascript">
     /* Dengan Rupiah */
     var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script> -->

  <script>
  document.getElementById('dengan-rupiah').addEventListener('input', function (e) {
    // Menghapus tanda ribuan yang ada saat ini dari nilai input
    let input = e.target.value.replace(/\D/g, '');

    // Format ulang angka dengan pemisah ribuan
    e.target.value = formatRupiah(input);
  });

  function formatRupiah(angka) {
    let number_string = angka.toString();
    let sisa = number_string.length % 3;
    let rupiah = number_string.substr(0, sisa);
    let ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
      let separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    return rupiah;
  }
</script>


</body>
@endsection
