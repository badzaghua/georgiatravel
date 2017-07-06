@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/ebrd_languages') }}">Ebrd language</a> :
@endsection
@section("contentheader_description", $ebrd_language->$view_col)
@section("section", "Ebrd languages")
@section("section_url", url(config('laraadmin.adminRoute') . '/ebrd_languages'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Ebrd languages Edit : ".$ebrd_language->$view_col)

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
				{!! Form::model($ebrd_language, ['route' => [config('laraadmin.adminRoute') . '.ebrd_languages.update', $ebrd_language->id ], 'method'=>'PUT', 'id' => 'ebrd_language-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/ebrd_languages') }}">Cancel</a></button>
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
	$("#ebrd_language-edit-form").validate({
		
	});
});
</script>
@endpush
