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
   <form action="/strava/simpan" method="POST" enctype="multipart/form-data">
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
                <label class="col-form-label">Segment</label>
                <input type="text" name="segment_strava" class="form-control"  placeholder="Segment ..." autocomplete="off" required>
            </div>

            <div class="form-group">
                <label class="col-form-label">Link</label>
                <input type="text" name="link" class="form-control"  placeholder="Link ..." autocomplete="off" required>
            </div>

            <div class="form-group">
                <label class="col-form-label">Temuan</label>
                <textarea name="temuan" class="form-control" autocomplete="off"> </textarea>
            </div>

            <div class="form-group">
                <label class="col-form-label">Tindak Lanjut</label>
                <textarea name="tindak_lanjut" class="form-control" autocomplete="off"> </textarea>
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
                <th width="150px">Segment</th>
                <th width="200px">Link</th>
                <th width="250px">Temuan</th>
                <th scope="col">Tindak Lanjut</th>
                <th scope="col">Tanggal</th>
                <th width="80px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->segment_strava }}</td>
                    <td>
                        <a href="{{ $data->link }}" target="_blank">{{ $data->link }}</a>
                    </td>
                    <td>{{ $data->temuan }}</td>
                    <td>{{ $data->tindak_lanjut }}</td>
                    <td>{{ $data->updated_at }}</td>
                    <td>
                        <a href="/strava/edit/{{ $data->id_strava }}" class="btn btn-warning fa fa-pencil-square-o" title="Edit"></a>
                        <a href="/strava/delete/{{ $data->id_strava }}" class="btn btn-danger remove-user fa fa-trash" title="Delete"></a>
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
</body>
@endsection
