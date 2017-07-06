@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/ebrd_tours') }}">Ebrd tour</a> :
@endsection
@section("contentheader_description", $ebrd_tour->$view_col)
@section("section", "Ebrd tours")
@section("section_url", url(config('laraadmin.adminRoute') . '/ebrd_tours'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Ebrd tours Edit : ".$ebrd_tour->$view_col)

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
				{!! Form::model($ebrd_tour, ['route' => [config('laraadmin.adminRoute') . '.ebrd_tours.update', $ebrd_tour->id ], 'method'=>'PUT', 'id' => 'ebrd_tour-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'types')
					@la_input($module, 'duration')
					@la_input($module, 'languages')
					@la_input($module, 'locations')
					@la_input($module, 'agency')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/ebrd_tours') }}">Cancel</a></button>
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
	$("#ebrd_tour-edit-form").validate({
		
	});
});
</script>
@endpush
