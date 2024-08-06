@extends('layout.v_template')
@section('title', 'Splitter')

@section('content')

<form action="/update_sc1/{{ $sc1->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="register-box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Splitter</label>
                    <input type="text" name="nama_sc1" value="{{ $sc1->nama_sc1 }}" class="form-control" placeholder="Nama Splitter 1 ..." autocomplete="off" >
                </div>

                <div class="form-group">
                    <label>Node</label>
                    <input type="text" name="node" value="{{ $sc1->node }}" class="form-control" placeholder="Node ..." autocomplete="off" >
                </div>
            </div>
            <div class="col-md-6">
                <!-- <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat ..." autocomplete="off" > </textarea>
                </div> -->

                <div class="form-group">
                    <label>Latitude & Longlitude</label>
                    <input type="text" name="latlong" value="{{ $sc1->latlong }}" class="form-control" placeholder="Latitude & Longlitude ..." autocomplete="off" >
                </div>
            </div>
        </div>
    </div>

<div class="row">
    @foreach ($data as $index => $item)
        <div class="col-md-4">
          <div class="box box-widget widget-user-1">
            <div class="widget-user-header bg-blue">
              <center class="form-row">
                <h3 class="widget-user-username">
                <a href="https://maps.google.com/?q={{ $item->latlong }}" target="_blank"><b style="color:white">({{ $index+1 }}) {{ $item->nama_sc1 }}</b> </a>
                </h3>
              </center>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <div class="form-row col-md-12">
                    <div class="form-group col-md-3">
                        <h5>Output</h5>
                    </div>
                    <div class="form-group col-md-9">
                        <input value="{{ $item->output }}" class="form-control" name="output[]">
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-3">
                        <h5>Nojar</h5>
                    </div>
                    <div class="form-group col-md-9">
                        <input value="{{ $item->nojar }}" class="form-control" name="nojar[]">
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-3">
                        <h5>Pelanggan</h5>
                    </div>
                    <div class="form-group col-md-9">
                        <input value="{{ $item->pelanggan }}" class="form-control" name="pelanggan[]">
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-3">
                        <h5>Segment</h5>
                    </div>
                    <div class="form-group col-md-9">
                        <input value="{{ $item->segment }}" class="form-control" name="segment[]">
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-3">
                        <h5>Alamat</h5>
                    </div>
                    <div class="form-group col-md-9">
                        <input value="{{ $item->alamat }}" class="form-control" name="alamat[]">
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-3">
                        <h5>Redaman</h5>
                    </div>
                    <div class="form-group col-md-6">
                        <input value="{{ $item->redaman }}" class="form-control" name="redaman[]">
                    </div>
                    <div class="form-group col-md-3">
                        <input value="{{ $item->id_sc2 }}" class="form-control" name="id_sc2[]" readonly>
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-3">
                        <h5>Updated</h5>
                    </div>
                    <div class="form-group col-md-9">
                        <input value="{{ $item->updated_at }}" class="form-control" >
                    </div>
                </div>

              </ul>
            </div>
          </div>
        </div>
    @endforeach
</div>

<br>
<a href="/show_sc1/{{ $item -> id }}" class="btn btn-primary fa fa-chevron-circle-left" type="button" title="Back">Back</a>
<button type="submit" class="btn btn-success rounded-0 fa fa-edit" rows="1">Update</button>

</form>
@endsection
