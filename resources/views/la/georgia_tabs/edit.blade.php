@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/georgia_tabs') }}">Georgia tab</a> :
@endsection
@section("contentheader_description", $georgia_tab->$view_col)
@section("section", "Georgia tabs")
@section("section_url", url(config('laraadmin.adminRoute') . '/georgia_tabs'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Georgia tabs Edit : ".$georgia_tab->$view_col)

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
				{!! Form::model($georgia_tab, ['route' => [config('laraadmin.adminRoute') . '.georgia_tabs.update', $georgia_tab->id ], 'method'=>'PUT', 'id' => 'georgia_tab-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'content')
					@la_input($module, 'glyphicon')
					@la_input($module, 'image')
					@la_input($module, 'lang')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/georgia_tabs') }}">Cancel</a></button>
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
	$("#georgia_tab-edit-form").validate({
		
	});
});
</script>
@endpush
