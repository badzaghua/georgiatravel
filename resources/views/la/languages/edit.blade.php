@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/languages') }}">Language</a> :
@endsection
@section("contentheader_description", $language->$view_col)
@section("section", "Languages")
@section("section_url", url(config('laraadmin.adminRoute') . '/languages'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Languages Edit : ".$language->$view_col)

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
				{!! Form::model($language, ['route' => [config('laraadmin.adminRoute') . '.languages.update', $language->id ], 'method'=>'PUT', 'id' => 'language-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'lang')
					@la_input($module, 'title')
					@la_input($module, 'locale')
					@la_input($module, 'langExt')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/languages') }}">Cancel</a></button>
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
	$("#language-edit-form").validate({
		
	});
});
</script>
@endpush
