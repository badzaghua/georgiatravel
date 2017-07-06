@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/social_media') }}">Social media</a> :
@endsection
@section("contentheader_description", $social_media->$view_col)
@section("section", "Social media")
@section("section_url", url(config('laraadmin.adminRoute') . '/social_media'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Social media Edit : ".$social_media->$view_col)

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
				{!! Form::model($social_media, ['route' => [config('laraadmin.adminRoute') . '.social_media.update', $social_media->id ], 'method'=>'PUT', 'id' => 'social_media-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'media')
					@la_input($module, 'href')
					@la_input($module, 'icon')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/social_media') }}">Cancel</a></button>
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
	$("#social_media-edit-form").validate({
		
	});
});
</script>
@endpush
