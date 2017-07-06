@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/georgias') }}">Georgia</a> :
@endsection
@section("contentheader_description", $georgia->$view_col)
@section("section", "Georgias")
@section("section_url", url(config('laraadmin.adminRoute') . '/georgias'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Georgias Edit : ".$georgia->$view_col)

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
				{!! Form::model($georgia, ['route' => [config('laraadmin.adminRoute') . '.georgias.update', $georgia->id ], 'method'=>'PUT', 'id' => 'georgia-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'slider')
					@la_input($module, 'lang')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/georgias') }}">Cancel</a></button>
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
	$("#georgia-edit-form").validate({
		
	});
});
</script>
@endpush
