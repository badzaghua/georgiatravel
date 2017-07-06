@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/event_settings') }}">Event setting</a> :
@endsection
@section("contentheader_description", $event_setting->$view_col)
@section("section", "Event settings")
@section("section_url", url(config('laraadmin.adminRoute') . '/event_settings'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Event settings Edit : ".$event_setting->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($event_setting, ['route' => [config('laraadmin.adminRoute') . '.event_settings.update', $event_setting->id ], 'method'=>'PUT', 'id' => 'event_setting-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'slider')
					@la_input($module, 'lang')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/event_settings') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#event_setting-edit-form").validate({
		
	});
});
</script>
@endpush
