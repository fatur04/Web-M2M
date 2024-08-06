@extends('layout.v_template')
@section('title', 'Report SLA Detail')

@section('content')
<div class="register-box-body">

    <div class="row input-daterange">

        <div class="col-md-4">
            <input type="date" name="tgl_awal" class="form-control" id="tgl_awal" placeholder="From Date" />
        </div>
        <div class="col-md-4">
            <input type="date" name="tgl_akhir" class="form-control" id="tgl_akhir" placeholder="To Date" />
        </div>
        <div class="col-md-1">
            <input type="hidden" name="id" class="form-control" id="id" value="{{$id}}" />
        </div>

        <div class="col-md-4">

            <a href="" onclick="this.href='{{ url('/view_detail') }}' + '/' +
            document.getElementById('id').value + '/' +
            document.getElementById('tgl_awal').value + '/' +
            document.getElementById('tgl_akhir').value " class="btn btn-primary"> Filter </a>

            <a href="" onclick="this.href='{{ url('/excel_detail') }}' + '/' +
            document.getElementById('id').value + '/' +
            document.getElementById('tgl_awal').value + '/' +
            document.getElementById('tgl_akhir').value " class="btn btn-success"
            target="_blank"> Export Excel</a>

            <a href="" onclick="this.href='{{ url('/pdf_detail') }}' + '/' +
            document.getElementById('id').value + '/' +
            document.getElementById('tgl_awal').value + '/' +
            document.getElementById('tgl_akhir').value " class="btn btn-danger"
            target="_blank"> Export PDF</a>

        </div>
    </div>
    
    <br>
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
        <?php $no=1 ?>
        @foreach ($hitung as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->site }}</td>
                <td>{{ $data->tiket }}</td>
                <td>{{ $data->isp }}</td>
                <td>{{ $data->problem }}</td>
                <td>{{ $data->mulai }}</td>
                <td>{{ $data->akhir }}</td>
                <td>{{ $data->avaibility }}</td>
                <td>{{ $data->hasil_persen }}</td>
                <td>{{ $data->maint }}</td>
                <td>{{ $data->persen }}</td>
                <td>{{ $data->total_jam }}</td>
            </tr>
        @endforeach
        {{-- <?php $hasil_hours = 0; ?>
            @foreach ($hitung as $total )
            <?php
                $hasil_hours += $total->maint;
                $waktu = $data->total_jam;

                $persen = round($hasil_hours/$waktu * 100, 2);
                $av = $waktu-$hasil_hours;
                $hasil_persen = round($av/$waktu * 100, 2);
            ?>
            @endforeach

            <tr>
                <td colspan="7">Total SLA</td>
                <td>{{ $av }}</td>
                <td>{{ $hasil_persen }}%</td>
                <td>{{ $hasil_hours }}</td>
                <td>{{ $persen }}</td>
                <td>{{ $data->total_jam }}</td>
            </tr> --}}
        </tbody>

    </table>
</div>
@endsection
