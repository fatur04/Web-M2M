@extends('layout.v_template')
@section('title', 'Realtime Log Activity')

<script src="{{asset('template')}}/jquery.min.js"></script>
<script src="{{asset('js/app.js')}}"></script>

</head>
<body>

<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable();
} );
</script>

@section('content')

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
                <th width="5px">No</th>
                <th width="50px">Nama</th>
                <th width="30px">Inisial</th>
                <th width="70px">Activity</th>
                <th width="50px">Date</th>
                {{-- <th width="50px">Action</th> --}}
                <!-- <th width="30px">Evidance Pengisian Kuota</th> -->

            </tr>
        </thead>
        <tbody id="update">
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id_log }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->inisial }}</td>
                    <td>{{ $item->activity }}</td>
                    <td>{{ $item->tanggal }}</td>
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

<script type="text/javascript">
    $(document).ready(function() {
            setInterval(function() {
                $.("update").load("{{ url('logupdate') }}");
            }, 1000);
        });
</script>

{{-- <script>
    window.Echo.channel('data-channel')
    .listen('DataUpdated', (e) => {
        console.log('Data updated: ', e.data);
        // Misalnya, menggunakan DataTables untuk refresh
        $('#table').DataTable().ajax.reload();
    });

</script> --}}

@endsection
