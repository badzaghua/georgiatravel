@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/events') }}">Event</a> :
@endsection
@section("contentheader_description", $event->$view_col)
@section("section", "Events")
@section("section_url", url(config('laraadmin.adminRoute') . '/events'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Events Edit : ".$event->$view_col)

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
				{!! Form::model($event, ['route' => [config('laraadmin.adminRoute') . '.events.update', $event->id ], 'method'=>'PUT', 'id' => 'event-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'provider')
					@la_input($module, 'category_id')
					@la_input($module, 'title')
					@la_input($module, 'slug')
					@la_input($module, 'datetime_from')
					@la_input($module, 'datetime_to')
					@la_input($module, 'content')
					@la_input($module, 'image')
					@la_input($module, 'organiser')
					@la_input($module, 'address')
					@la_input($module, 'lng')
					@la_input($module, 'lat')
					@la_input($module, 'min_price')
					@la_input($module, 'max_price')
					@la_input($module, 'website')
					@la_input($module, 'original_href')
					@la_input($module, 'original_id')
					@la_input($module, 'price')
					@la_input($module, 'town')
					@la_input($module, 'translation')
					@la_input($module, 'lang')
					@la_input($module, 'status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/events') }}">Cancel</a></button>
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
	$("#event-edit-form").validate({
		
	});
});
</script>
@endpush
