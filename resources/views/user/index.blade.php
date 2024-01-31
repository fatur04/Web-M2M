@extends('layout.v_template')
@section('title', 'View Admin')

@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Tambah</button>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
    <form action="/user/simpan/" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Tambah User</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
                <label class="col-form-label">Nama User</label>
                <input type="text" name="name" class="form-control"  placeholder="Nama User ..." autocomplete="off" required>
            </div>

            <div class="form-group">
                <label class="col-form-label">Email</label>
                <input type="email" name="email" class="form-control"  placeholder="Email ..." autocomplete="off" required>
            </div>

            <div class="form-group">
                <label class="col-form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password ..." autocomplete="off" required>
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
                <th scope="col">Action</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
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
                  url: '{{url('/datatableuser')}}',
              },

              columns: [
                  {
                        "data" :null, "sortable": false,
                        render : function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                  },
                    {data: 'action', name: 'action'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
              ],
              order: [[0, 'desc']]
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

@endsection
