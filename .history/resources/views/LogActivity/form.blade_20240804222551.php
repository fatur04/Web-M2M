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
                                            <label for="initial">Inisial</label>
                                            <select class="form-control" id="initial" name="initial">
                                                <option value="">Pilih Inisial</option>
                                                @foreach($activities as $activity)
                                                    <option value="{{ $activity->initial }}">{{ $activity->initial }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name" readonly>
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
        document.getElementById('initial').addEventListener('change', async function() {
            const initial = this.value;
            if (initial) {
                try {
                    const response = await fetch(`/inisial?inisial=${inisial}`);
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
