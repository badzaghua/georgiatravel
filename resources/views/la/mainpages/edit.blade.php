@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/mainpages') }}">Mainpage</a> :
@endsection
@section("contentheader_description", $mainpage->$view_col)
@section("section", "Mainpages")
@section("section_url", url(config('laraadmin.adminRoute') . '/mainpages'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Mainpages Edit : ".$mainpage->$view_col)

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
				{!! Form::model($mainpage, ['route' => [config('laraadmin.adminRoute') . '.mainpages.update', $mainpage->id ], 'method'=>'PUT', 'id' => 'mainpage-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'slider')
					@la_input($module, 'caption')
					@la_input($module, 'sections')
					@la_input($module, 'experiences')
					@la_input($module, 'keywords')
					@la_input($module, 'description')
					@la_input($module, 'lang')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/mainpages') }}">Cancel</a></button>
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
	$("#mainpage-edit-form").validate({
		
	});
});
</script>
@endpush
