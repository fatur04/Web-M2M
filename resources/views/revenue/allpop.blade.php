@extends('layout.v_template')
@section('title', 'REVENUE ALL POP SEOA')

@section('content')

<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
        <div class="inner">
            <h4>ALL PELANGGAN</h4>
            <p>Total Pelanggan: {{ $totalData }}</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
        <a href="/revenue" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

 <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
        <div class="inner">
            <h4>ALL POP</h4>
            <p>Total POP: {{ $jumlahpop }}</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/revenue/allpop" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
 </div>
</div>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Tambah</button>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
    <form action="/revenue/simpan" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
                <label class="col-form-label">Node</label>
                <input type="text" name="node" class="form-control"  placeholder="Node ..." autocomplete="off" required>
            </div>

            <div class="form-group">
                <label class="col-form-label">Nomor Jaringan</label>
                <input type="text" name="nojar" class="form-control"  placeholder="Nomor Jaringan ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Pelanggan</label>
                <input type="text" name="pelanggan" class="form-control"  placeholder="Pelanggan ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Revenue</label>
                <input type="text" name="revenue" id="dengan-rupiah" class="form-control"  placeholder="Revenue ..." autocomplete="off" >
            </div>

            <div class="form-group">
                <label class="col-form-label">Port</label>
                <input type="text" name="port" class="form-control"  placeholder="Port ..." autocomplete="off" >
            </div>

            <div class="form-group">
                    <label for="lang">Status</label>
                    <select name="status" class="form-control">
                        <option value="UP">UP</option>
                        <option value="DOWN">DOWN</option>
                        <option value="REGISTERED">REGISTERED</option>
                    </select>
            </div>

            <div class="form-group">
                <label class="col-form-label">Tanggal</label>
                <input type="date" name="updated_at" class="form-control" autocomplete="off" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
    </div>
  </div>

<div class="box">
  <div class="col-md-12">
    <div class="box">
        <div class="box-header">
              <h3 class="box-title">ALL POP SEOA</h3>
        </div>

        <div class="box-body">
        @foreach ($semuapop as $semuapop )
            <a href="/revenue_allpop/{{ $semuapop }}" class="btn btn-app">
                <i class="fa fa-inbox" style="color: #2cd00b;"></i> {{ $semuapop }}
            </a>
        @endforeach
        </div>

  </div>
</div>

<script src="{{asset('template')}}/jquery.min.js"></script>


@endsection
