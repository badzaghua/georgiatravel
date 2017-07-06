@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/towns') }}">Town</a> :
@endsection
@section("contentheader_description", $town->$view_col)
@section("section", "Towns")
@section("section_url", url(config('laraadmin.adminRoute') . '/towns'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Towns Edit : ".$town->$view_col)

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
				{!! Form::model($town, ['route' => [config('laraadmin.adminRoute') . '.towns.update', $town->id ], 'method'=>'PUT', 'id' => 'town-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'slug')
					@la_input($module, 'content')
					@la_input($module, 'region')
					@la_input($module, 'image')
					@la_input($module, 'slider')
					@la_input($module, 'hasmap')
					@la_input($module, 'places')
					@la_input($module, 'translation')
					@la_input($module, 'lang')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/towns') }}">Cancel</a></button>
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
	$("#town-edit-form").validate({
		
	});
});
</script>
@endpush
