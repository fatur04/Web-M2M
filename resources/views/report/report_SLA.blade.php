@extends('layout.v_template')
@section('title', 'Report SLA Detail')

@section('content')
<div class="register-box-body">
    <div class="row input-daterange">

        <div class="col-md-3">
            <label>Start Date</label>
            <input type="date" name="tgl_awal" class="form-control" id="tgl_awal" placeholder="From Date" />
        </div>
        <div class="col-md-3">
            <label>End Date</label>
            <input type="date" name="tgl_akhir" class="form-control" id="tgl_akhir" placeholder="To Date" />
        </div>
        {{-- <div class="col-md-3">
          <label>Nama Site</label>
          <select class="cari form-control" placeholder="Nama Site ..." name="nama_site" required></select>
        </div>
        
        <div class="col-md-3">
            <label>ISP</label>
            <select name="isp" id="isp" class="form-control">
                <option >Select</option>
                <option value="primacom">PRIMACOM</option>
                <option value="indosat">INDOSAT</option>
                <option value="telkom">TELKOM</option>
                <option value="ocygen">OXCYGEN</option>
                <option value="lintasmaya">LINTASMAYA</option>
                <option value="xl">XL</option>
                <option value="iforte">IFORTE</option>
                <option value="linknet">LINKNET</option>
                <option value="satnet">SATNET</option>
                <option value="mkn">MKN</option>
            </select>
        </div> --}}

        <div class="col-md-4">
          <br>
            <a href="" onclick="this.href='{{ url('/view_report') }}' + '/' +
            // document.getElementById('nama_site').value + '/' +
            // document.getElementById('isp').value + '/' +
            document.getElementById('tgl_awal').value + '/' +
            document.getElementById('tgl_akhir').value " class="btn btn-primary"> Filter </a>

            <a href="" onclick="this.href='{{ url('/excel') }}' + '/' +
            // document.getElementById('nama_site').value + '/' +
            // document.getElementById('isp').value + '/' +
            document.getElementById('tgl_awal').value + '/' +
            document.getElementById('tgl_akhir').value " class="btn btn-success"
            target="_blank"> Export Excel</a>

            <a href="" onclick="this.href='{{ url('/pdf') }}' + '/' +
            // document.getElementById('nama_site').value + '/' +
            // document.getElementById('isp').value + '/' +
            document.getElementById('tgl_awal').value + '/' +
            document.getElementById('tgl_akhir').value " class="btn btn-danger"
            target="_blank"> Export PDF</a>

        </div>
    </div>
    <br><br>
    <table class="table table-hover" id="table" width="100%">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name Link</th>
            <th scope="col">Problem</th>
            <th scope="col">Ticket ID</th>
            <th scope="col">ISP</th>
            <th scope="col">Start Problem</th>
            <th scope="col">End Problem</th>
            <th scope="col">Avaibility</th>
            <th scope="col">Total 100%</th>
            <th scope="col">Hours</th>
            <th scope="col">%</th>
            <th scope="col">Total Hours</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<script type="text/javascript">
  $('.cari').select2({
    placeholder: 'Cari...',
    ajax: {
      url: '/cari',
      dataType: 'json',
      delay: 250,
      processResults: function (data) {
        return {
          results:  $.map(data, function (item) {
            return {
              text: item.site,
              id: item.id_site
            }
          })
        };
      },
      cache: true
    }
  });

</script>
  <script type="text/javascript">

    $(document).ready(function() {
        $("#table").DataTable({
              serverSide: true,
            //   processing: true,
              ajax: {
                  url: '{{url('/reportsla_datatable')}}',
              },

              columns: [
                  {
                        "data" :null, "sortable": false,
                        render : function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                  },
                    {data: 'site', name: 'site'},
                    {data: 'problem', name: 'problem'},
                    {data: 'tiket', name: 'tiket'},
                    {data: 'isp', name: 'isp'},
                    {data: 'mulai', name: 'mulai'},
                    {data: 'akhir', name: 'akhir'},
                    {data: 'avaibility', name: 'hours'},
                    {data: 'hasil_persen', name: 'hasil_persen'},
                    {data: 'maint', name: 'maint'},
                    {data: 'persen', name: 'persen'},
                    {data: 'total_jam', name: 'total_jam'}
              ],
              //order: [['0', 'DESC']]
        });

    });
  </script>
@endsection
