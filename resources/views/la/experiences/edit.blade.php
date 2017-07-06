@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/experiences') }}">Experience</a> :
@endsection
@section("contentheader_description", $experience->$view_col)
@section("section", "Experiences")
@section("section_url", url(config('laraadmin.adminRoute') . '/experiences'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Experiences Edit : ".$experience->$view_col)

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
				{!! Form::model($experience, ['route' => [config('laraadmin.adminRoute') . '.experiences.update', $experience->id ], 'method'=>'PUT', 'id' => 'experience-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'slug')
					@la_input($module, 'image')
					@la_input($module, 'slider')
					@la_input($module, 'content')
					@la_input($module, 'description')
					@la_input($module, 'keywords')
					@la_input($module, 'parent')
					@la_input($module, 'translation')
					@la_input($module, 'lang')
					@la_input($module, 'status')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/experiences') }}">Cancel</a></button>
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
	$("#experience-edit-form").validate({
		
	});
});
</script>
@endpush
