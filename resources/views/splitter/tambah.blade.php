@extends('layout.v_template')
@section('title', 'Tambah SLA')

@section('content')

<form action="/simpan_splitter/" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="register-box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Splitter</label>
                    <textarea name="nama_splitter" class="form-control" placeholder="Nama Splitter ..." autocomplete="off" > </textarea>
                </div>

                <div class="form-group">
                    <label>Node</label>
                    <input type="text" name="node" class="form-control" placeholder="Node ..." autocomplete="off" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat ..." autocomplete="off" > </textarea>
                </div>

                <div class="form-group">
                    <label>Latitude & Longlitude</label>
                    <input type="text" name="latlong"  class="form-control" placeholder="Latitude & Longlitude ..." autocomplete="off" >
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
                    <input type="text" name="input1" class="form-control" placeholder="Input 1 ..." autocomplete="off" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Input 2</label>
                    <input class="form-control" placeholder="Input 2 ..." name="input2" >
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
                    <input class="form-control" placeholder="Output 1 ..." name="output1" >
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input class="form-control" placeholder="Nojar 1 ..." name="nojar1" >
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input class="form-control" placeholder="db 1 ..." name="redaman1" >
                </div>

                <div class="form row col-md-7">
                    <label>Output 2</label>
                    <input class="form-control" placeholder="Output 2 ..." name="output2" >
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input class="form-control" placeholder="Nojar 2 ..." name="nojar2" >
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input class="form-control" placeholder="db 2 ..." name="redaman2" >
                </div>

                <div class="form row col-md-7">
                    <label>Output 3</label>
                    <input class="form-control" placeholder="Output 3 ..." name="output3" >
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input class="form-control" placeholder="Nojar 3 ..." name="nojar3" >
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input class="form-control" placeholder="db 3 ..." name="redaman3" >
                </div>

                <div class="form row col-md-7">
                    <label>Output 4</label>
                    <input class="form-control" placeholder="Output 4 ..." name="output4" >
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input class="form-control" placeholder="Nojar 4 ..." name="nojar4" >
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input class="form-control" placeholder="db 4 ..." name="redaman4" >
                </div>

            </div>
            <div class="form-group col-md-6">
                <div class="form row col-md-7">
                    <label>Output 5</label>
                    <input class="form-control" placeholder="Output 5 ..." name="output5" >
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input class="form-control" placeholder="Nojar 5 ..." name="nojar5" >
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input class="form-control" placeholder="db 5 ..." name="redaman5" >
                </div>

                <div class="form row col-md-7">
                    <label>Output 6</label>
                    <input class="form-control" placeholder="Output 6 ..." name="output6" >
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input class="form-control" placeholder="Nojar 6 ..." name="nojar6" >
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input class="form-control" placeholder="db 6 ..." name="redaman6" >
                </div>

                <div class="form row col-md-7">
                    <label>Output 7</label>
                    <input class="form-control" placeholder="Output 7 ..." name="output7" >
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input class="form-control" placeholder="Nojar 7 ..." name="nojar7" >
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input class="form-control" placeholder="db 7 ..." name="redaman7" >
                </div>

                <div class="form row col-md-7">
                    <label>Output 8</label>
                    <input class="form-control" placeholder="Output 8 ..." name="output8" >
                </div>
                <div class="form row col-md-4">
                    <label>Nojar</label>
                    <input class="form-control" placeholder="Nojar 8 ..." name="nojar8" >
                </div>
                <div class="form row col-md-3">
                    <label>Redaman</label>
                    <input class="form-control" placeholder="db 8 ..." name="redaman8" >
                </div>
            </div>
        </div>

        <div class="form-group">
            <a href="/splitter" class="btn btn-primary">Back</a>
            <button type="submit" class="btn btn-success" rows="2">Tambah</button>
        </div>

    </div>
</form>

@endsection
