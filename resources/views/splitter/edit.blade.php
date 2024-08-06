@extends('layout.v_template')
@section('title', 'Splitter SC1')

@section('content')
<form action="/update_splitter/{{ $data->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="register-box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Splitter</label>
                    <textarea name="nama_splitter" class="form-control" placeholder="Nama Splitter ..." autocomplete="off"> {{ $data->nama_splitter }}</textarea>
                </div>

                <div class="form-group">
                    <label>Node</label>
                    <input type="text" name="node" value="{{ $data->node }}" class="form-control" placeholder="Node ..." autocomplete="off">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat ..." autocomplete="off"> {{ $data->alamat }}</textarea>
                </div>

                <div class="form-group">
                    <label>Latitude & Longlitude</label>
                    <input type="text" name="latlong" value="{{ $data->latlong }}" class="form-control" placeholder="Latitude & Longlitude ..." autocomplete="off">
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
                    <input type="text" name="input1" value="{{ $data->input1 }}" class="form-control" placeholder="Input 1 ..." autocomplete="off">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Input 2</label>
                    <input value="{{ $data->input2 }}" class="form-control" placeholder="Input 2 ..." name="input2">
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
                    <input value="{{ $data->output1 }}" class="form-control" placeholder="Output 1 ..." name="output1">
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar1 }}" class="form-control" placeholder="Nojar 1 ..." name="nojar1">
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman1 }}" class="form-control" placeholder="Redaman 1 ..." name="redaman1">
                </div>

                <div class="form row col-md-7">
                    <label>Output 2</label>
                    <input value="{{ $data->output2 }}" class="form-control" placeholder="Output 2 ..." name="output2">
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar2 }}" class="form-control" placeholder="Nojar 1 ..." name="nojar2">
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman2 }}" class="form-control" placeholder="Redaman 1 ..." name="redaman2">
                </div>

                <div class="form row col-md-7">
                    <label>Output 3</label>
                    <input value="{{ $data->output3 }}" class="form-control" placeholder="Output 3 ..." name="output3">
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar3 }}" class="form-control" placeholder="Nojar 1 ..." name="nojar3">
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman3 }}" class="form-control" placeholder="Redaman 1 ..." name="redaman3">
                </div>

                <div class="form row col-md-7">
                    <label>Output 4</label>
                    <input value="{{ $data->output4 }}" class="form-control" placeholder="Output 4 ..." name="output4">
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar4 }}" class="form-control" placeholder="Nojar 4 ..." name="nojar4">
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman4 }}" class="form-control" placeholder="Redaman 4 ..." name="redaman4">
                </div>

            </div>
            <div class="form-group col-md-6">
                <div class="form row col-md-7">
                    <label>Output 5</label>
                    <input value="{{ $data->output5 }}" class="form-control" placeholder="Output 5 ..." name="output5">
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar5 }}" class="form-control" placeholder="Nojar 5 ..." name="nojar5">
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman5 }}" class="form-control" placeholder="Redaman 5 ..." name="redaman5">
                </div>

                <div class="form row col-md-7">
                    <label>Output 6</label>
                    <input value="{{ $data->output6 }}" class="form-control" placeholder="Output 6 ..." name="output6">
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar6 }}" class="form-control" placeholder="Nojar 6 ..." name="nojar6">
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman6 }}" class="form-control" placeholder="Redaman 6 ..." name="redaman6">
                </div>

                <div class="form row col-md-7">
                    <label>Output 7</label>
                    <input value="{{ $data->output7 }}" class="form-control" placeholder="Output 7 ..." name="output7">
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar7 }}" class="form-control" placeholder="Nojar 7 ..." name="nojar7">
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman7 }}" class="form-control" placeholder="Redaman 7 ..." name="redaman7">
                </div>

                <div class="form row col-md-7">
                    <label>Output 8</label>
                    <input value="{{ $data->output8 }}" class="form-control" placeholder="Output 8 ..." name="output8">
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input value="{{ $data->nojar8 }}" class="form-control" placeholder="Nojar 8 ..." name="nojar8">
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input value="{{ $data->redaman8 }}" class="form-control" placeholder="Redaman 8 ..." name="redaman8">
                </div>
            </div>
        </div>
    </div>

  <br>
<a href="/splitter" class="btn btn-primary fa fa-chevron-circle-left" type="button" title="Back">Back</a>
<button type="submit" class="btn btn-success rounded-0 fa fa-edit" rows="1">Update</button>
</form>
@endsection
