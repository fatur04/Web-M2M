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
                <th >No</th>
                <th >Initial</th>
                <th >Nama</th>
                <th >Cluster</th>
                <th >Start</th>
                <th >End</th>
                <th >Activity</th>
                <th width="50px">Action</th>
                <!-- <th width="30px">Evidance Pengisian Kuota</th> -->

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id_log }}</td>
                    <td>{{ $item->initial }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->cluster }}</td>
                    <td>{{ $item->start }}</td>
                    <td>{{ $item->end }}</td>
                    <td>{{ $item->activity }}</td>
                    {{-- <td>
                        <img src="{{ asset('activity/' . $item->image) }}" width="200" height="400" alt="image" class="img-center">
                    </td> --}}
                    <td>
                        <a href="/edit-activity/{{ $item->id_log }}" class="btn btn-warning fa fa-pencil-square-o" title="Edit"></a>
                        <a href="/logactivity/delete/{{ $item->id_log }}" class="btn btn-danger remove-user fa fa-trash" title="Delete"></a>
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

<script>
    async function fetchData() {
        try {
            const response = await fetch('https://seoa.my.id/logupdate'); // Ganti dengan URL API Laravel Anda
            const data = await response.json();
            updateTable(data);
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    function updateTable(data) {
        const tbody = document.querySelector('#table tbody');
        tbody.innerHTML = ''; // Clear existing content
        data.forEach(item => {
            const row = document.createElement('tr');
            const id_log = document.createElement('td');
            id_log.textContent = item.id_log;
            const nama = document.createElement('td');
            nama.textContent = item.nama;
            const initial = document.createElement('td');
            initial.textContent = item.initial;
            const cluster = document.createElement('td');
            cluster.textContent = item.cluster;
            const start = document.createElement('td');
            tanggal.textContent = item.start;
            const end = document.createElement('td');
            image.textContent = item.end;
            const activity = document.createElement('td');
            activity.textContent = item.activity;
            row.appendChild(id_log);
            row.appendChild(nama);
            row.appendChild(initial);
            row.appendChild(activity);
            row.appendChild(tanggal);
            row.appendChild(image);
            tbody.appendChild(row);
        });
    }

    // Fetch data on page load
    window.onload = fetchData;

    // Set interval to fetch data every 5 seconds (5000 milliseconds)
    setInterval(fetchData, 1000);
</script>
@endsection
