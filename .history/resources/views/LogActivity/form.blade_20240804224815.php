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
</head>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable();
    } );
    </script>
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
                                <form id="activity-form" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="inisial">Inisial</label>
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

                        <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table" width="100%">
                                <thead>
                                    <tr>
                                        <th width="5px">No</th>
                                        <th width="50px">Nama</th>
                                        <th width="30px">Inisial</th>
                                        <th width="70px">Activity</th>
                                        <th width="50px">Date</th>
                                        <th width="50px">Action</th>
                                        <!-- <th width="30px">Evidance Pengisian Kuota</th> -->
                        
                                    </tr>
                                </thead>
                                <tbody>
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
                </div>
            </div>
        </div>
    </div>

    <!-- AdminLTE JS -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('inisial').addEventListener('change', async function() {
            const inisial = this.value;
            if (inisial) {
                try {
                    const response = await fetch(`/Inisial?inisial=${inisial}`);
                    const activity = await response.json();
                    document.getElementById('nama').value = activity.nama;
                } catch (error) {
                    console.error('Error fetching activity:', error);
                }
            } else {
                document.getElementById('nama').value = '';
            }
        });
    </script>
</body>
</html>
