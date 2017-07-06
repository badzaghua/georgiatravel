@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/ebrd_types') }}">Ebrd type</a> :
@endsection
@section("contentheader_description", $ebrd_type->$view_col)
@section("section", "Ebrd types")
@section("section_url", url(config('laraadmin.adminRoute') . '/ebrd_types'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Ebrd types Edit : ".$ebrd_type->$view_col)

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
				{!! Form::model($ebrd_type, ['route' => [config('laraadmin.adminRoute') . '.ebrd_types.update', $ebrd_type->id ], 'method'=>'PUT', 'id' => 'ebrd_type-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/ebrd_types') }}">Cancel</a></button>
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
	$("#ebrd_type-edit-form").validate({
		
	});
});
</script>
@endpush
