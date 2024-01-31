@extends('layout.v_template')
@section('title', 'View User RFID')

@section('content')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Tambah
</button>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form action="/simpan/" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <center><h3 class="modal-title" id="exampleModalLongTitle">Tambah SLA</h3></center>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                              <div class="register-box-body">
                                <div class="form-group row">
                                    <label>Nama Site</label>
                                    <input type="text" name="nama_site" class="form-control"  placeholder="Nama Site ..." autocomplete="off" required>
                                </div>

                                <div class="form-group row">
                                    <label>Tiket</label>
                                    <input type="text" name="tiket" class="form-control"  placeholder="Tiket ..." autocomplete="off" required>
                                </div>

                                <div class="form-group row">
                                    <label>Problem</label>
                                    <input type="text" name="problem" class="form-control" placeholder="Problem ..." autocomplete="off" required>
                                </div>

                                <div class="form-group row">
                                    <label for="lang">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1">OPEN</option>
                                        <option value="2">CLOSE</option>
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label>Start</label>
                                    <input type="datetime-local" name="mulai" class="form-control" placeholder="mulai ..." autocomplete="off" required>
                                </div>

                                <div class="form-group row">
                                    <label>End</label>
                                    <input type="datetime-local" name="akhir" class="form-control" placeholder="akhir ..." autocomplete="off" required>
                                </div>

                              </div>
                        </div>
                    </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
    </form>
  </div>

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
                <th scope="col">Action</th>
                <th scope="col">Nama Site</th>
                <th scope="col">Tiket</th>
                <th scope="col">Problem</th>
                <th scope="col">Status</th>
                <th scope="col">Start</th>
                <th scope="col">End</th>

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
            //   processing: true,
              ajax: {
                  url: '{{url('/datatable')}}',
              },

              columns: [
                  {
                        "data" :null, "sortable": false,
                        render : function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                  },
                    {data: 'action', name: 'action'},
                    {data: 'nama_site', name: 'nama_site'},
                    {data: 'tiket', name: 'tiket'},
                    {data: 'problem', name: 'problem'},
                    {data: 'status', name: 'status'},
                    {data: 'mulai', name: 'mulai'},
                    {data: 'akhir', name: 'akhir'}
              ],
              order: [[0, 'desc']]
        });

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
