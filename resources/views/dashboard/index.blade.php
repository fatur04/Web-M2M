@extends('layout.v_template')
@section('title', 'View Dashboard')

@section('content')
<div class="register-box-body">
    <div class="row input-daterange">

        {{-- <div class="col-md-4">
            <label>Bulan</label>
            <input type="month" name="bulan" class="form-control" id="bulan" value="{{$bulan}}" placeholder="From Date" />
        </div> --}}

        <div class="col-md-3">
            <label>Start Date</label>
            <input type="date" name="tgl_awal" class="form-control" id="tgl_awal" value="2021-12-01" placeholder="From Date" />
        </div>
        <div class="col-md-3">
            <label>End Date</label>
            <input type="date" name="tgl_akhir" class="form-control" id="tgl_akhir" value="2021-12-31" placeholder="To Date" />
        </div>
        
        <div class="col-md-5">
            <br>
            {{-- <a href="" onclick="this.href='{{ url('/hasil') }}' + '/' +
            //document.getElementById('bulan').value + '/' +
            document.getElementById('bulan').value " class="btn btn-success"> Filter </a> --}}

            <a href="" onclick="this.href='{{ url('/hasil') }}' + '/' +
            //document.getElementById('isp').value + '/' +
            document.getElementById('tgl_awal').value + '/' +
            document.getElementById('tgl_akhir').value " class="btn btn-success"> Filter </a>
        </div>
        
    </div>
</div>

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
                <th scope="col">No</th>
                <th scope="col">Nama ISP</th>
                <th scope="col">Mulai & Akhir</th>
                <th scope="col">Total Tiket/Bulan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>PRIMACOM</td>
                <td> 2021-12-01 - 2021-12-31</td>               
                <td>{{ $primacom }}</td>
                <td><a href="/reportsite" class="btn btn-primary">View</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td>TELKOM</td>
                <td> 2021-12-01 - 2021-12-31</td>
                <td>{{ $telkom }}</td>
                <td><a href="/reportsite" class="btn btn-primary">View</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>INDOSAT</td>
                <td> 2021-12-01 - 2021-12-31</td>
                <td>{{ $indosat }}</td>
                <td><a href="/reportsite" class="btn btn-primary">View</a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>LINKNET</td>
                <td> 2021-12-01 - 2021-12-31</td>
                <td>{{ $linknet }}</td>
                <td><a href="/reportsite" class="btn btn-primary">View</a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>IFORTE</td>
                <td> 2021-12-01 - 2021-12-31</td>
                <td>{{ $iforte }}</td>
                <td><a href="/reportsite" class="btn btn-primary">View</a></td>
            </tr>
            <tr>
                <td>6</td>
                <td>MORATEL</td>
                <td> 2021-12-01 - 2021-12-31</td>
                <td>{{ $moratel }}</td>
                <td><a href="/reportsite" class="btn btn-primary">View</a></td>
            </tr>
            <tr>
                <td>7</td>
                <td>SATNET</td>
                <td> 2021-12-01 - 2021-12-31</td>
                <td>{{ $satnet }}</td>
                <td><a href="/reportsite" class="btn btn-primary">View</a></td>
            </tr>
            <tr>
                <td>8</td>
                <td>XL</td>
                <td> 2021-12-01 - 2021-12-31</td>
                <td>{{ $xl }}</td>
                <td><a href="/reportsite" class="btn btn-primary">View</a></td>
            </tr>
            <tr>
                <td>9</td>
                <td>MKN</td>
                <td> 2021-12-01 - 2021-12-31</td>
                <td>{{ $mkn }}</td>
                <td><a href="/reportsite" class="btn btn-primary">View</a></td>
            </tr>
        </tbody>
    </table>
   </div>

   </div>
    <!-- /.box-body -->
</div>
  <!-- /.box -->
  <script src="{{asset('template')}}/jquery.min.js"></script>

@endsection
