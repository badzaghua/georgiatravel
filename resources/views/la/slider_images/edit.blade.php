@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/slider_images') }}">Slider image</a> :
@endsection
@section("contentheader_description", $slider_image->$view_col)
@section("section", "Slider images")
@section("section_url", url(config('laraadmin.adminRoute') . '/slider_images'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Slider images Edit : ".$slider_image->$view_col)

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
				{!! Form::model($slider_image, ['route' => [config('laraadmin.adminRoute') . '.slider_images.update', $slider_image->id ], 'method'=>'PUT', 'id' => 'slider_image-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'image')
					@la_input($module, 'caption')
					@la_input($module, 'secondary_caption')
					@la_input($module, 'href')
					@la_input($module, 'slider')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/slider_images') }}">Cancel</a></button>
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
	$("#slider_image-edit-form").validate({
		
	});
});
</script>
@endpush
