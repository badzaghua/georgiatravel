@extends('layouts.default')
@section('content')

@section('title',$event->title)
@section('description',Ogdescription($event->content))
@section('ogimage',Ogimagepath($event->image))



<img data-src="{{ Imagepath($event->image) }}/w=1800&h=400" class="lazy">


<div class="container page-content">

<div class="row">


    <div class="col-md-8 col-sm-12 col-xs-12 event-left">
<h1>{{ $event->title }}</h1>
{!! $event->content !!}




    </div>
    <div class="col-md-4 col-sm-12 col-xs-12 event-right">
@if($event->ticket_link)   
    <a class="btn btn-ticket" href="{{ $event->ticket_link }}" role="button">{{ trans('lang.buyticket') }}</a> <br/>  <br/> 
@endif



        @if($event->website)

    <p><a href='http://{{ $event->website }}' target="_blank">{{ trans('lang.website') }}</a></p>
    @endif
    
    
    
    <hr>
    <strong> {{ trans('lang.date') }}</strong>
    <p><i class="fa fa-calendar-o" aria-hidden="true"></i> {{ date_create($event->datetime_from)->format("Y-m-d")  }} <br/><small> <i class="fa fa-clock-o" aria-hidden="true"></i> {{ date_create($event->datetime_from  )->format("H:i")  }}</small></p>
    @if($event->datetime_to != $event->datetime_from)
    <p><i class="fa fa-calendar-o" aria-hidden="true"></i> {{ date_create($event->datetime_to)->format("Y-m-d")   }} <br/><small> <i class="fa fa-clock-o" aria-hidden="true"></i> {{ date_create($event->datetime_to  )->format("H:i")  }}</small></p>
    <br/> 
    @endif





    @if($event->price)
        <hr>
        <strong>{{ trans('lang.ticketprice') }}</strong>
    <p> {{ $event->price }} GEL</p>
    @endif

@if($event->pTown)
<hr>
<strong>{{ trans('lang.location') }}</strong>
<br>
<a href="{{ Prefixedurl($event->pTown,'town') }}">{{ $event->pTown->title }}</a>
<br>
@endif


@if($event->address) 
{{ $event->address }}
<br>
@endif

    @if($event->place_record_id)
    <?
    $object = file_get_contents('http://places.georgia.travel/api/?record_id='.$event->place_record_id);
    $object = json_decode($object);
    ?>


    <p>
    {{ $object->name  }}
    </p>
    <p><i class="fa fa-map-marker" aria-hidden="true"></i> {!! $object->mapaddress  !!} </p>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20747.93222129734!2d{{ $object->lng }}!3d{{ $object->lat }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDHCsDE5JzE0LjYiTiA0NsKwNDAnMDcuMiJF!5e0!3m2!1ska!2sge!4v1475822685628" width="350" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>


    @endif




<!-- <img src="http://maps.googleapis.com/maps/api/staticmap?center=52.3132560,4.9905430&zoom=14&size=428x280&style=saturation:-100"> -->
    <br>
    </div>
 

</div>
<div class="row">

    
<div class="col-md-12">
        
        

<!--- save button -->
<br>
@include('sections/saveButton',['id'=>$event->id,'type'=>'event','title'=>$event->title,'image'=>Imagepath($event->image),'href'=>url()->current()])
<br>

  <p>@include('sections/social')</p>


<div class="comments">
<h1>{{ trans('lang.leavecomment') }}</h1>
@include('sections.disqus')
</div>  

</div>    
    </div>    







@if($featured_events)

<div class="container-fluid">
<div class="container">
<div class="col-md-12"><h2>{{ trans('lang.similarevents') }}</h2></div>


@foreach($featured_events as $featured_event)
<div class="col-sm-6 col-md-4 event-block">
  <div class="thumbnail event-wrap">
  <a href="{{ Baseurl("event/$featured_event->slug") }}">
  <div class="event-img">
    <img class="img-responsive lazy"  data-src="{{ Imagepath($featured_event->image) }}/w=200&h=260">
    <span class="event-date">{{ date( 'M d', strtotime( $featured_event->datetime_from ) )  }}</span>
    <span class="event-category"><i class="fa fa-list-alt" aria-hidden="true"></i> {{ $featured_event->category->title }}</span> 
    </div>
  </a>
  <div class="event-content">
      <h3 class="event-title">{{ $featured_event->title }}</h3>
      <br>
</div>
    </div>

  </div>
  
  
@endforeach

</div>
</div>
@endif
</div>
    </div>
@endsection