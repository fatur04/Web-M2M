@extends('layout.v_template')
@section('title', 'Form Log Activity')

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
        <div class="box-body">
            @if (session('pesan'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Success</h4>
                {{ session('pesan') }}.
            </div>
        @endif

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Formulir Aktivitas</h3>
                                </div>
                                <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="activity-id" name="id">
                                    <div class="card-body">
                                        {{-- <div class="form-group">
                                            <label for="initial">Inisial</label>
                                            <select class="form-control" id="initial" name="initial">
                                                <option value="">Pilih Initial</option>
                                                @foreach($activities as $activity)
                                                    <option value="{{ $activity->initial }}">{{ $activity->initial }}</option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="inisial">Inisial</label>
                                            <input type="text" class="form-control" id="inisial" name="inisial">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="cluster">Cluster</label>
                                            <input type="text" class="form-control" id="cluster" name="cluster">
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Start</label>
                                            <input type="datetime-local" class="form-control" id="tanggal" name="tanggal">
                                        </div>
                                        <div class="form-group">
                                            <label for="date">End</label>
                                            <input type="datetime-local" class="form-control" id="tanggal" name="tanggal">
                                        </div>
                                        <div class="form-group">
                                            <label for="activity">Activity</label>
                                            <input type="text" class="form-control" id="activity" name="activity">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="image">Gambar</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div> --}}
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="table" width="100%">
                            <thead>
                                <tr>
                                    <th width="5px">No</th>
                                    <th width="50px">Nama</th>
                                    <th width="30px">Initial</th>
                                    <th width="70px">Activity</th>
                                    <th width="50px">Date</th>
                                    {{-- <th width="70px">Gambar</th> --}}
                                    <th width="50px">Action</th>
                                    <!-- <th width="30px">Evidance Pengisian Kuota</th> -->
                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id_log }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->initial }}</td>
                                        <td>{{ $item->activity }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        {{-- <td>
                                            <img src="{{ asset('activity/' . $item->image) }}" width="200" height="400" alt="image" class="img-center">
                                        </td> --}}
                                        <td>
                                            <a href="/edit-activity/{{ $item->id_log }}" class="btn btn-warning fa fa-pencil-square-o" title="Edit"></a>
                                            <a href="/edit-activity/{{ $item->id_log }}" class="btn btn-danger remove-user fa fa-trash" title="Delete"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- AdminLTE JS -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    {{-- <script>
        document.getElementById('initial').addEventListener('change', async function() {
            const initial = this.value;
            if (initial) {
                try {
                    const response = await fetch(`get-activity?initial=${initial}`);
                    const activity = await response.json();
                    document.getElementById('nama').value = activity.nama;
                    document.getElementById('date').value = activity.date;
                    document.getElementById('activity-id').value = activity.id;
                } catch (error) {
                    console.error('Error fetching activity:', error);
                }
            } else {
                document.getElementById('nama').value = '';
                document.getElementById('date').value = '';
                document.getElementById('activity-id').value = '';
            }
        });
        
    </script> --}}
</body>
@endsection
