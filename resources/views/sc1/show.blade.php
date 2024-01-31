@extends('layout.v_template')
@section('title', 'View SC2')

@section('content')

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
                        <input value="{{ $item->output }}" class="form-control" name="nojar2" readonly>
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-3">
                        <h5>Pelanggan</h5>
                    </div>
                    <div class="form-group col-md-9">
                        <input value="{{ $item->nojar }}" class="form-control" name="nojar2" readonly>
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-3">
                        <h5>Pelanggan</h5>
                    </div>
                    <div class="form-group col-md-9">
                        <input value="{{ $item->pelanggan }}" class="form-control" name="nojar2" readonly>
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-3">
                        <h5>Segment</h5>
                    </div>
                    <div class="form-group col-md-9">
                        <input value="{{ $item->segment }}" class="form-control" name="nojar2" readonly>
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-3">
                        <h5>Alamat</h5>
                    </div>
                    <div class="form-group col-md-9">
                        <input value="{{ $item->alamat }}" class="form-control" name="nojar2" readonly>
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-3">
                        <h5>Redaman</h5>
                    </div>
                    <div class="form-group col-md-9">
                        <input value="{{ $item->redaman }}" class="form-control" name="nojar2" readonly>
                    </div>
                </div>

                <div class="form-row col-md-12">
                    <div class="form-group col-md-3">
                        <h5>Updated</h5>
                    </div>
                    <div class="form-group col-md-9">
                        <input value="{{ $item->updated_at }}" class="form-control" name="nojar2" readonly>
                    </div>
                </div>

              </ul>
            </div>
          </div>
        </div>
    @endforeach
</div>


<br>
<a href="/sc1" class="btn btn-success fa fa-chevron-circle-left" type="button" title="Back">Back</a>
<a href="/edit_sc1/{{ $item -> id }}" class="btn btn-primary rounded-0 fa fa-edit" type="button" title="Edit">Edit</a>
@endsection
