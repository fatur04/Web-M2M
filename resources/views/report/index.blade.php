@extends('layout.v_template')
@section('title', 'Report SLA ')

@section('content')

<div class="container-fluid">
    @foreach ($site as $key => $data)
    <div class="col-md-2">
        <div class="row justify-content-md-center">
            <div class="register-box-body">
                <center data-toggle="tooltip" id="tooltip">
                    <a href="/detail_report/{{ $data->id_site }}"  title=" {{ $data->site }}" class="fa fa-server" style="font-size:48px;color:green"></a><br>
                    <h4>{{ $data->site }}</h4>
                </center>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script src="{{asset('template')}}/jquery.min.js"></script>
<script>
    $('.tooltip').each(function () {
	$(this).tooltip(
	{
		html: true,
		title: $('#' + $(this).data('tip')).html()
	});
});
 </script>
@endsection
