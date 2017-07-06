@extends('layouts.default')
@section('content')

@section('title',trans('lang.events'))
@section('description',Ogdescription())
@section('ogimage',Ogimagepath())



@if(count($slider))
@include('sections.halfSlider')
@endif
<div class="container-fluid filter-container">
    <div class="eventfilter">
      <div class="container">
             {{ Form::open(array('url' => Baseurl('events/search'), 'method' => 'get')) }}
          <div class="col-md-4">
            <div class="form-group">
              <label class="sr-only" for="location">Location</label>
             {{ Form::select('where',$eventWhere,$where,['id'=>'where','class'=>'form-control']) }}
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label class="sr-only" for="checkin">Check in</label>
              <div class="input-group">
                <input type="text" name="date_from" value="{{ $date_from }}" class="form-control datepicker" id="checkin" placeholder="Check in">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label class="sr-only" for="checkout">Check out</label>
              <div class="input-group">
                <input type="text" name="date_to" value="{{ $date_to }}" class="form-control datepicker" id="checkout" placeholder="Check out">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label class="sr-only" for="eventCategories">Type</label>
              {{ Form::select('category',$eventCategories,$category,['id'=>'eventCategories','class'=>'form-control']) }}
            </div>
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-default btn-primary">{{ trans('lang.search') }}</button>
            {{ Form::close() }}
          </div>
        </div>
    </div>
  </div>
          
          
<div class="page-bg">
      
<div class="container">
        @foreach($events as $event)
<div class="col-sm-6 col-md-4 event-block">
  <div class="thumbnail event-wrap">
  <a href="{{ Baseurl("event/$event->slug") }}">
  <div class="event-img">
    <img class="img-responsive lazy"  data-src="{{ Imagepath($event->image) }}/360x320">
    <span class="event-date">{{ date( 'M d', strtotime( $event->datetime_from ) )  }}</span>
    <span class="event-category"><i class="fa fa-list-alt" aria-hidden="true"></i> {{ $event->category->title }}</span> 
    </div>
  </a>
  <div class="event-content">
      <h3 class="event-title">{{ $event->title }}</h3>
      <br>

</div>
    </div>

  </div>

@endforeach
    </div>
   
</div>
{{ $events->links() }}
</div>



<style type="text/css">
	.nav-new {
		background: #656c7a;
    height: 130px;
    position: initial;
	}
</style>

<script>
  $('.datepicker').datepicker();
</script>

@endsection