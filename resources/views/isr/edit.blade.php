@extends('layout.v_template')
@section('title', 'View ISR')

</head>
<body>
@section('content')

<div class="box">
    <div class="box-body">

    @foreach($data as $data)
    <form action="/isr/update/{{ $data->no_isr }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-2"></div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-sm-12">
              <div class="register-box-body">

                <div class="form-group row">
                    <label class="col-form-label">Nama Stasiun</label>
                    <input type="text" name="nama_stasiun" class="form-control" value="{{ $data->nama_stasiun }}" autocomplete="off">
                </div>

                <div class="form-group row">
                    <label class="col-form-label">Perangkat</label>
                    <input type="text" name="perangkat" class="form-control" value="{{ $data->perangkat }}" autocomplete="off" >
                </div>

                <div class="form-group row">
                    <label class="col-form-label">Frekuensi TX</label>
                    <input type="text" name="frekuensi_rx" class="form-control" value="{{ $data->frekuensi_rx }}" autocomplete="off" >
                </div>

                <div class="form-group row">
                    <label class="col-form-label">Frekuensi RX</label>
                    <input type="text" name="frekuensi_tx" class="form-control" value="{{ $data->frekuensi_tx }}" autocomplete="off" >
                </div>

                <div class="form-group row">
                    <label class="col-form-label">Periode Awal</label>
                    <input type="date" name="period_awal" class="form-control" value="{{ $data->period_awal }}" autocomplete="off" >
                </div>

                <div class="form-group row">
                    <label class="col-form-label">Periode Akhir</label>
                    <input type="date" name="period_akhir" class="form-control" value="{{ $data->period_akhir }}" autocomplete="off" >
                </div>

                <div class="form-group row">
                    <label class="col-form-label">BHP</label>
                    <input type="text" name="bhp" class="form-control" value="{{ $data->bhp }}" autocomplete="off" >
                </div>

                <div class="form-group row">
                    <label class="col-form-label">Site ID</label>
                    <input type="text" name="siteid" class="form-control" value="{{ $data->siteid }}" autocomplete="off" >
                </div>

                <div class="form-group row">
                    <label class="col-form-label">ISR</label>
                    <input type="text" name="isr" class="form-control" value="{{ $data->isr }}"autocomplete="off" >
                </div>

                <div class="form-group row">
                    <label class="col-form-label">PSB User</label>
                    <input type="text" name="psb_user" class="form-control" value="{{ $data->psb_user }}" autocomplete="off" >
                </div>

                <div class="form-group row">
                    <label class="col-form-label">PSB Kemitraan</label>
                    <input type="text" name="psb_kemitraan" class="form-control" value="{{ $data->psb_kemitraan }}" autocomplete="off" >
                </div>

                <div class="form-group row">
                    <label class="col-form-label">Tanggal</label>
                    <input type="datetime-local" name="updated_at" value="{{ $data->updated_at }}" class="form-control" autocomplete="off" required>
                </div>

                <div class="form-group row">
                    <a href="/isr" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-success" rows="2">Update</button>
                </div>

              </div>
            </div>
        </div>
    </div>
    @endforeach
</form>

    </div>
</div>

<script src="{{asset('template')}}/jquery.min.js"></script>

@endsection
