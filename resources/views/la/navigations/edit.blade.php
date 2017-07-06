@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/navigations') }}">Navigation</a> :
@endsection
@section("contentheader_description", $navigation->$view_col)
@section("section", "Navigations")
@section("section_url", url(config('laraadmin.adminRoute') . '/navigations'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Navigations Edit : ".$navigation->$view_col)

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
				{!! Form::model($navigation, ['route' => [config('laraadmin.adminRoute') . '.navigations.update', $navigation->id ], 'method'=>'PUT', 'id' => 'navigation-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'href')
					@la_input($module, 'order')
					@la_input($module, 'image')
					@la_input($module, 'lang')
					@la_input($module, 'keyword')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/navigations') }}">Cancel</a></button>
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
	$("#navigation-edit-form").validate({
		
	});
});
</script>
@endpush
