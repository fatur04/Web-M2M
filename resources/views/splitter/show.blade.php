@extends('layout.v_template')
@section('title', 'Splitter SC1')

@section('content')
    <div class="register-box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Splitter</label>
                    <textarea name="nama_splitter" class="form-control" autocomplete="off" readonly> {{ $data->nama_splitter }}</textarea>
                </div>

                <div class="form-group">
                    <label>Node</label>
                    <input type="text" name="node" value="{{ $data->node }}" class="form-control" autocomplete="off" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" autocomplete="off" readonly> {{ $data->alamat }}</textarea>
                </div>

                <div class="form-group">
                    <label>Latitude & Longlitude</label>
                    <input type="text" name="latlong" value="{{ $data->latlong }}" class="form-control" autocomplete="off" readonly>
                </div>
            </div>
        </div>
    </div>

    <h3></h3>

    <div class="register-box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Input 1</label>
                    <input type="text" name="input1" value="{{ $data->input1 }}" class="form-control" autocomplete="off" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Input 2</label>
                    <input value="{{ $data->input2 }}" class="form-control" name="input2" readonly>
                </div>
            </div>
        </div>
    </div>

    <center><h2></h2></center>

    <!-- <div class="box"> -->

    <div class="register-box-body">
        <div class="row">
            <div class="form-group col-md-6">
                <div class="form row col-md-7">
                    <label>Output 1</label>
                    <input value="{{ $data->output1 }}" class="form-control"  name="output1" readonly>
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar1 }}" class="form-control" name="nojar1" readonly>
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman1 }}" class="form-control" name="redaman1" readonly>
                </div>

                <div class="form row col-md-7">
                    <label>Output 2</label>
                    <input value="{{ $data->output2 }}" class="form-control"  name="output2" readonly>
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar2 }}" class="form-control" name="nojar2" readonly>
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman2 }}" class="form-control" name="redaman2" readonly>
                </div>

                <div class="form row col-md-7">
                    <label>Output 3</label>
                    <input value="{{ $data->output3 }}" class="form-control"  name="output3" readonly>
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar3 }}" class="form-control" name="nojar3" readonly>
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman3 }}" class="form-control" name="redaman3" readonly>
                </div>

                <div class="form row col-md-7">
                    <label>Output 4</label>
                    <input value="{{ $data->output4 }}" class="form-control"  name="output4" readonly>
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar4 }}" class="form-control" name="nojar4" readonly>
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman4 }}" class="form-control"  name="redaman4" readonly>
                </div>

            </div>
            <div class="form-group col-md-6">
                <div class="form row col-md-7">
                    <label>Output 5</label>
                    <input value="{{ $data->output5 }}" class="form-control"  name="output5" readonly>
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar5 }}" class="form-control" name="nojar5" readonly>
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman5 }}" class="form-control"  name="redaman5" readonly>
                </div>

                <div class="form row col-md-7">
                    <label>Output 6</label>
                    <input value="{{ $data->output6 }}" class="form-control"  name="output6" readonly>
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar6 }}" class="form-control" name="nojar6" readonly>
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman6 }}" class="form-control" name="redaman6" readonly>
                </div>

                <div class="form row col-md-7">
                    <label>Output 7</label>
                    <input value="{{ $data->output7 }}" class="form-control"  name="output7" readonly>
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar7 }}" class="form-control" name="nojar7" readonly>
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman7 }}" class="form-control" name="redaman7" readonly>
                </div>

                <div class="form row col-md-7">
                    <label>Output 8</label>
                    <input value="{{ $data->output8 }}" class="form-control"  name="output8" readonly>
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar8 }}" class="form-control" name="nojar8" readonly>
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman8 }}" class="form-control" name="redaman8" readonly>
                </div>
            </div>
        </div>
    </div>

  <br>
<a href="/splitter" class="btn btn-success fa fa-chevron-circle-left" type="button" title="Back">Back</a>
<a href="/edit_splitter/{{ $data -> id }}" class="btn btn-primary rounded-0 fa fa-edit" type="button" title="Edit">Edit</a>
@endsection
