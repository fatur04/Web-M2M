@extends('layout.v_template')
@section('title', 'View SLA Internal')

@section('content')

  <a href="/tambah_splitter" class="btn btn-primary">Tambah</a>
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
                <th scope="col">Nama Splitter</th>
                <th scope="col">Node</th>
                <th scope="col">Alamat</th>
                <th width="150px">Latitude & Longlitude</th>
                <th width="65px">Action</th>

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
                  url: '{{url('/datatable_splitter')}}',
              },

              columns: [
                  {
                        "data" :null, "sortable": false,
                        render : function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                  },
                    {data: 'nama_splitter', name: 'nama_splitter'},
                    {data: 'node', name: 'node'},
                    {data: 'alamat', name: 'alamat'},
                    {data: 'latlong', name: 'latlong'},
                    {data: 'action', name: 'action'}

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
