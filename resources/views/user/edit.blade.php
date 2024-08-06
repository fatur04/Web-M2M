@extends('layout.v_template')
@section('title', 'Edit SLA')

@section('content')

<form action="/user/update/{{ $user->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-md-2"></div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-sm-12">
              <div class="register-box-body">

                <div class="form-group row">
                    <label>Nama User</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Nama User ..." autocomplete="off" required>
                </div>

                <div class="form-group row">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email ..." autocomplete="off" required>
                </div>


                <div class="form-group row">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password ..." autocomplete="off" required>
                </div>

                <div class="form-group row">
                    <a href="/user" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-success" rows="2">Simpan</button>
                </div>

              </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $('.cari').select2({
      placeholder: 'Cari...',
      ajax: {
        url: '/cari',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.site,
                id: item.id_site
              }
            })
          };
        },
        cache: true
      }
    });

  </script>
@endsection
