@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/user_saves') }}">User safe</a> :
@endsection
@section("contentheader_description", $user_safe->$view_col)
@section("section", "User saves")
@section("section_url", url(config('laraadmin.adminRoute') . '/user_saves'))
@section("sub_section", "Edit")

@section("htmlheader_title", "User saves Edit : ".$user_safe->$view_col)

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
				{!! Form::model($user_safe, ['route' => [config('laraadmin.adminRoute') . '.user_saves.update', $user_safe->id ], 'method'=>'PUT', 'id' => 'user_safe-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'user_id')
					@la_input($module, 'type')
					@la_input($module, 'title')
					@la_input($module, 'image')
					@la_input($module, 'href')
					@la_input($module, 'object')
					@la_input($module, 'object_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/user_saves') }}">Cancel</a></button>
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
	$("#user_safe-edit-form").validate({
		
	});
});
</script>
@endpush
