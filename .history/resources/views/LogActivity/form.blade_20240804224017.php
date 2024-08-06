<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Aktivitas</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Formulir Aktivitas</h1>
                        </div>
                    </div>
                </div>
            </div>

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
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="initial">Inisial</label>
                                            <select class="form-control" id="inisial" name="inisial">
                                                <option value="">Pilih Inisial</option>
                                                @foreach($activities as $activity)
                                                    <option value="{{ $activity->inisial }}">{{ $activity->inisial }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Tanggal</label>
                                            <input type="date" class="form-control" id="date" name="date">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Gambar</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Aktivitas</h3>
                                </div>
                                <div class="card-body">
                                    <table id="data-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Inisial</th>
                                                <th>Nama</th>
                                                <th>Date</th>
                                                <th>Gambar</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
    <script>
        document.getElementById('initial').addEventListener('change', async function() {
            const initial = this.value;
            if (initial) {
                try {
                    const response = await fetch(`/get-activity?initial=${initial}`);
                    const activity = await response.json();
                    document.getElementById('name').value = activity.name;
                } catch (error) {
                    console.error('Error fetching activity:', error);
                }
            } else {
                document.getElementById('name').value = '';
            }
        });

        $(document).ready(function() {
            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('form.getActivities') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'initial', name: 'initial' },
                    { data: 'name', name: 'name' },
                    { data: 'date', name: 'date' },
                    { data: 'image', name: 'image', render: function(data) {
                        return data ? `<img src="/storage/${data}" width="100" />` : 'No image';
                    }}
                ]
            });
        });
    </script>
</body>
</html>
