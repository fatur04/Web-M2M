@extends('layout.v_template')
@section('title', 'Edit Strava')

@section('content')

@foreach($data as $data)
<div class="box">
<div class="box-body">

<form action="/strava/update/{{ $data->id_strava }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-2"></div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-sm-12">
              <div class="register-box-body">

                <div class="form-group row">
                    <label>Segment</label>
                    <input type="text" name="segment_strava" class="form-control" value="{{ $data->segment_strava }}" placeholder="Segment ..." autocomplete="off" required>
                </div>

                <div class="form-group row">
                    <label>Link</label>
                    <input type="text" name="link" class="form-control" value="{{ $data->link }}" autocomplete="off" required>
                </div>

                <div class="form-group row">
                    <label>Temuan</label>
                    <textarea name="temuan" class="form-control" value="" autocomplete="off">{{ $data->temuan }} </textarea>
                </div>

                <div class="form-group row">
                    <label class="col-form-label">Tindak Lanjut</label>
                    <textarea name="tindak_lanjut" class="form-control" value="" autocomplete="off">{{ $data->tindak_lanjut }} </textarea>
                </div>

                <div class="form-group row">
                    <label class="col-form-label">Tanggal</label>
                    <input type="date" name="updated_at" value="{{ $data->updated_at }}" class="form-control" autocomplete="off" required>
                </div>

                <div class="form-group row">
                    <a href="/strava" class="btn btn-primary">Back</a>
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
