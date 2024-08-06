@extends('layout.v_template')
@section('title', 'Report SLA Detail')

@section('content')
<div class="register-box-body">
    
    <center> {{ $bulan }} </center>
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
