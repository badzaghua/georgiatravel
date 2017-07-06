@extends('layouts.default')

@section('title','Tours')
@section('content')



<div class="container-fluid filter-container">
    <div class="eventfilter">
      <div class="container">
             {{ Form::open(array('url' => Baseurl('rugby-tours'), 'method' => 'get')) }}
          <div class="col-md-2">
            <div class="form-group">
              <label class="" for="location">Location</label>
             {{ Form::select('location',$search_locations,$search_location,['id'=>'where','class'=>'form-control']) }}
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label class="" for="location">Type</label>
             {{ Form::select('type',$search_types,$search_type,['id'=>'where','class'=>'form-control']) }}
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label class="" for="location">Language</label>
             {{ Form::select('language',$search_languages,$search_language,['id'=>'where','class'=>'form-control']) }}
            </div>
          </div>             
          <div class="col-md-1">
            <div class="form-group">
              <label class="" for="location">Duration</label>
             <input type="number" class="form-control" value="{{ $search_duration }}">
            </div>
          </div>
          <div class="col-md-2">
          	<br>
            <button type="submit" class="btn btn-default btn-primary">{{ trans('lang.search') }}</button>
            {{ Form::close() }}
          </div>
        </div>
    </div>
  </div>


<div class="container">

<h1 style="padding-top:20px;" class="text-center">Tours</h1>

<div class="row masonry">
@foreach($tours as $tour)
<div class="col-sm-4 panel">
<h3>{{ $tour->title }}</h3>


<b>Tour Type</b> 
@foreach($tour->types as $type)
{{ $type->title }} 
@endforeach
<br>


<b>Tour Duration</b> 
{{ $tour->duration }} Days
<br>

<b>Tour Locations</b> 
@foreach($tour->locations as $location)
{{ $location->title }} 
@endforeach
<br>

<b>Tour Languages</b> 
@foreach($tour->languages as $language)
{{ $language->title }} 
@endforeach
<br>

<b>Travel Agency</b> 
{{ $tour->agency }} 
<br>

@if(null!==$tour->upload_tour)
<b>Download Tour</b> 
<a class="underlined" href="{{ Filepath($tour->upload_tour) }}">Click Here</a> 
<br>
@endif


</div>
@endforeach
</div>
<br>
<br>


<style type="text/css">
	.nav-new {
		background: #656c7a;
    	height: 130px;
    	position: initial;
	}
</style>


<div class="container text-center">
{{ $tours->links() }}
</div>
</div>

@endsection