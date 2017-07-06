@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/article_categories') }}">Article category</a> :
@endsection
@section("contentheader_description", $article_category->$view_col)
@section("section", "Article categories")
@section("section_url", url(config('laraadmin.adminRoute') . '/article_categories'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Article categories Edit : ".$article_category->$view_col)

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
				{!! Form::model($article_category, ['route' => [config('laraadmin.adminRoute') . '.article_categories.update', $article_category->id ], 'method'=>'PUT', 'id' => 'article_category-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'title')
					@la_input($module, 'lang')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/article_categories') }}">Cancel</a></button>
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
	$("#article_category-edit-form").validate({
		
	});
});
</script>
@endpush
