@extends('layout.v_template')
@section('title', 'Edit M2M BDA')

@section('content')

@foreach($data as $data)
<div class="box">
<div class="box-body">

<form action="/m2mbwa/update/{{ $data->id_soltemp }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-2"></div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-sm-12">
              <div class="register-box-body">

                <div class="form-group row">
                    <label>Nama M2M</label>
                    <input type="text" name="nama_soltemp" class="form-control" value="{{ $data->nama_soltemp }}" placeholder="Nama M2M ..." autocomplete="off">
                </div>

                <div class="form-group row">
                    <label>Nomor Jaringan</label>
                    <input type="text" name="nojar_soltemp" class="form-control" value="{{ $data->nojar_soltemp }}" autocomplete="off">
                </div>

                <div class="form-group row">
                    <label>Pelanggan</label>
                    <textarea name="pelanggan_soltemp" class="form-control" value="{{ $data->pelanggan_soltemp }}" autocomplete="off">{{ $data->pelanggan_soltemp }} </textarea>
                </div>

                <div class="form-group row">
                    <label class="col-form-label">Nomor Kartu</label>
                    <textarea name="nomor_soltemp" class="form-control" value="{{ $data->nomor_soltemp }}" autocomplete="off">{{ $data->nomor_soltemp }} </textarea>
                </div>

                <div class="form-group row">
                    <label class="col-form-label">Kuota Kartu</label>
                    <input type="number" name="kuota" class="form-control" value="{{ $data->kuota }}" autocomplete="off" required>
                </div>

                <div class="form-group row">
                    <label>Upload Foto Pengisian Kuota </label>
                    <input type="file" name="foto_kuota" class="form-control" value="" autocomplete="off">
                    <h5>Noted : Jika Sudah Upload Gambar, jangan lupa update tanggal pengisian</h5>
                </div>

                <div class="form-group row">
                    <label for="lang">Status</label>
                    <select name="status" value="{{ $data->status }}" class="form-control">
                        <!-- <option value="Pending">Pending</option> -->
                        <option value="Sukses">Sukses</option>
                        <option value="On Progress">On Progress</option>
                    </select>
                </div>

                <div class="form-group row">
                    <label class="col-form-label">Tanggal</label>
                    <input type="datetime-local" name="updated_at" value="{{ \Carbon\Carbon::parse($data->updated_at)->format('Y-m-d\TH:i') }}" class="form-control" autocomplete="off">
                </div>

                <div class="form-group row">
                    <a href="/m2msast" class="btn btn-primary">Back</a>
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

@endsection
