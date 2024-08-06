@extends('layout.v_template')
@section('title', 'REVENUE ALL PELANGGAN SEOA')

@section('content')

<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
        <div class="inner">
            <h4>ALL PELANGGAN</h4>
            <p>Total Pelanggan: {{ $totalData }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
        <a href="/revenue" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

 <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
        <div class="inner">
            <h4>ALL POP</h4>
            <p>Total POP: {{ $jumlahpop }}</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/revenue_allpop" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
 </div>
</div>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Tambah</button>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
    <form action="/revenue/simpan" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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

            <div class="form-group">
                <label class="col-form-label">Tanggal</label>
                <input type="date" name="updated_at" class="form-control" autocomplete="off" required>
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

  {{-- <a href="/tambah" class="btn btn-primary">Tambah</a> --}}
  <div class="box">

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
                <th scope="col">No</th>
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
        </tbody>
    </table>


   </div>
</div>
    <!-- /.box-body -->
</div>
  <!-- /.box -->
  <script src="{{asset('template')}}/jquery.min.js"></script>

  <script type="text/javascript">

    $(document).ready(function() {
        $("#table").DataTable({
              serverSide: true,
              //processing: true,
              pagination: true,
              responsive: true,
              searching: true,
              ordering: true,
              ajax: {
                  url: '{{url('/datatable_revenue')}}',
              },
              buttons: false,
              searching: true,
            //   scrollY: 500,
            //   scrollX: true,
              scrollCollapse: true,
              columns: [
                  {
                        "data" :null, "sortable": false,
                        render : function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                  },
                    {data: 'node', name: 'node'},
                    {data: 'nojar', name: 'nojar'},
                    {data: 'pelanggan', name: 'pelanggan'},
                    {data: 'revenue', name: 'revenue'},
                    {data: 'port', name: 'port'},
                    {data: 'status', name: 'status'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action'},
              ],
              order: [[8, 'desc']]
        });

        $("body").on("click",".remove-user",function(event){
            event.preventDefault();
            var current_object = $(this);
            swal({
                title: "Are you sure?",
                text: "Kamu akan menghapus data user",
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
  <script type="text/javascript">
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
  </script>

@endsection
