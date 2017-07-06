@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/svgmaps') }}">Svgmap</a> :
@endsection
@section("contentheader_description", $svgmap->$view_col)
@section("section", "Svgmaps")
@section("section_url", url(config('laraadmin.adminRoute') . '/svgmaps'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Svgmaps Edit : ".$svgmap->$view_col)

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
				{!! Form::model($svgmap, ['route' => [config('laraadmin.adminRoute') . '.svgmaps.update', $svgmap->id ], 'method'=>'PUT', 'id' => 'svgmap-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'data_region')
					@la_input($module, 'town')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/svgmaps') }}">Cancel</a></button>
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
	$("#svgmap-edit-form").validate({
		
	});
});
</script>
@endpush
