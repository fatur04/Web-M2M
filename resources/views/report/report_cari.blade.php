@extends('layout.v_template')
@section('title', 'Report SLA Detail')

@section('content')
<div class="register-box-body">
    <div class="row input-daterange">

        <div class="col-md-2">
            <input type="date" name="tgl_awal" class="form-control" id="tgl_awal" placeholder="From Date" />
        </div>
        <div class="col-md-2">
            <input type="date" name="tgl_akhir" class="form-control" id="tgl_akhir" placeholder="To Date" />
        </div>
        {{-- <div class="col-md-3">
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

        <div class="col-md-5">
            <a href="/reportsla" class="btn bg-navy">Back</a>
            
            <a href="" onclick="this.href='{{ url('/view_report') }}' + '/' +
            //document.getElementById('isp').value + '/' +
            document.getElementById('tgl_awal').value + '/' +
            document.getElementById('tgl_akhir').value " class="btn btn-primary"> Filter </a>

            <a href="" onclick="this.href='{{ url('/excel') }}' + '/' +
            //document.getElementById('isp').value + '/' +
            document.getElementById('tgl_awal').value + '/' +
            document.getElementById('tgl_akhir').value " class="btn btn-success"
            target="_blank"> Export Excel</a>

            <a href="" onclick="this.href='{{ url('/pdf') }}' + '/' +
            //document.getElementById('isp').value + '/' +
            document.getElementById('tgl_awal').value + '/' +
            document.getElementById('tgl_akhir').value " class="btn btn-danger"
            target="_blank"> Export PDF</a>

            

        </div>
    </div>
    <br>
    <center> {{ $tgl_awal }} - {{ $tgl_akhir }} </center>
    <table class="table table-hover">
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
        {{-- <?php echo $hitung; ?> --}}
        <?php $no=1 ?>
        @if ($hitung == '[]')
            @foreach ($site as $sites)
            <td>Tidak ada data di site {{ $sites->site }}</td>
            @endforeach
        @else
            @foreach ($hitung as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->site }}</td>
                <td>{{ $data->problem }}</td>
                <td>{{ $data->tiket }}</td>
                <td>{{ $data->isp }}</td>
                <td>{{ $data->mulai }}</td>
                <td>{{ $data->akhir }}</td>
                <td>{{ $data->avaibility }}</td>
                <td>{{ $data->hasil_persen }}</td>
                <td>{{ $data->maint }}</td>
                <td>{{ $data->persen }}</td>
                <td>{{ $data->total_jam }}</td>
            </tr>
            @endforeach
            <?php $hasil_hours = 0; ?>
            
            @foreach ($hitung as $total )
            <?php
                $hasil_hours += $total->maint;                
            ?>
            @endforeach
            <?php 
                $waktu = $data->total_jam;
                $totalnya = $waktu*$sum;

                //$persen = round($hasil_hours/$waktu * 100, 2);
                $av = $waktu-$hasil_hours;
                $hasil_persen = round($av/$totalnya * 100, 2);
                $persen = 100-$hasil_persen;
            ?>

            <tr>
                <td colspan="7">Total SLA</td>
                <td>{{ $av }}</td>
                <td>{{ $persen }}%</td>
                <td>{{ $hasil_hours }}</td>
                <td>{{ $hasil_persen }}</td>
                <td>{{ $totalnya }}</td>
            </tr>
        @endif
        
            
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
@endsection
