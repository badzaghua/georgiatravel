@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/static_pages') }}">Static page</a> :
@endsection
@section("contentheader_description", $static_page->$view_col)
@section("section", "Static pages")
@section("section_url", url(config('laraadmin.adminRoute') . '/static_pages'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Static pages Edit : ".$static_page->$view_col)

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
				{!! Form::model($static_page, ['route' => [config('laraadmin.adminRoute') . '.static_pages.update', $static_page->id ], 'method'=>'PUT', 'id' => 'static_page-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'translation')
					@la_input($module, 'title')
					@la_input($module, 'slug')
					@la_input($module, 'content')
					@la_input($module, 'lang')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/static_pages') }}">Cancel</a></button>
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
	$("#static_page-edit-form").validate({
		
	});
});
</script>
@endpush
