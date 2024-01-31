@extends('layout.v_template')
@section('title', 'Edit Strava')

@section('content')

@foreach($data as $data)
<form action="/revenue/update/{{ $data->id_revenue }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-2"></div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-sm-12">
              <div class="register-box-body">

                <div class="form-group row">
                    <label>Node</label>
                    <input type="text" name="node" class="form-control" value="{{ $data->node }}" placeholder="Segment ..." autocomplete="off" required>
                </div>

                <div class="form-group row">
                    <label>Nomor Jaringan</label>
                    <input type="text" name="nojar" class="form-control" value="{{ $data->nojar }}" autocomplete="off" >
                </div>

                <div class="form-group row">
                    <label>Pelanggan</label>
                    <input type="text" name="pelanggan" class="form-control" value="{{ $data->pelanggan }}" autocomplete="off" >
                </div>

                <div class="form-group row">
                    <label>Revenue</label>
                    <input type="text" name="revenue" id="dengan-rupiah" class="form-control" value="{{ $data->revenue }}" autocomplete="off" >
                </div>

                <div class="form-group row">
                    <label>Port</label>
                    <input type="text" name="port" class="form-control" value="{{ $data->port }}" autocomplete="off" >
                </div>

                <div class="form-group row">
                <label for="lang">Status</label>
                    <select name="status" value="{{ $data->status }}" class="form-control">
                        <option value="UP">UP</option>
                        <option value="DOWN">DOWN</option>
                        <option value="REGISTERED">REGISTERED</option>
                    </select>
                </div>

                <div class="form-group row">
                    <label class="col-form-label">Tanggal</label>
                    <input type="date" name="updated_at" value="{{ $data->updated_at }}" class="form-control" autocomplete="off" required>
                </div>

                <div class="form-group row">
                    <a href="/revenue" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-success" rows="2">Update</button>
                </div>

              </div>
            </div>
        </div>
    </div>
    @endforeach
</form>

<!-- <script type="text/javascript">
     /* Dengan Rupiah */
     var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script> -->

  <script>
  document.getElementById('dengan-rupiah').addEventListener('input', function (e) {
    // Menghapus tanda ribuan yang ada saat ini dari nilai input
    let input = e.target.value.replace(/\D/g, '');

    // Format ulang angka dengan pemisah ribuan
    e.target.value = formatRupiah(input);
  });

  function formatRupiah(angka) {
    let number_string = angka.toString();
    let sisa = number_string.length % 3;
    let rupiah = number_string.substr(0, sisa);
    let ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
      let separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    return rupiah;
  }
</script>

@endsection
