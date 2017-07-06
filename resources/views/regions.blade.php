<?
$langLinks = array('en'=>url('/en/regions'),'ru'=>'/ru/regions','ge'=>'/ge/regions');
?>
@extends('layouts.default',['langLinks'=>$langLinks])

@section('title',trans('lang.destinations'))
@section('description',Ogdescription())
@section('ogimage',Ogimagepath())


@section('content')





<div class="container page-wrap">






<h1 style="padding-top:20px;">{{ trans('lang.towns') }}</h1>


<div class="row top-experiences">
@foreach($towns as $town) 
    <div class="col-sm-3">
      <div class="card">
        <a href="{{ Baseurl($town->parent->slug.'/'.$town->slug) }}">
        <div class="card-image">
          <img class="img-responsive lazy" data-src="{{ Imagepath($town->image) }}/w=400&h=360">
          <span class="card-title">{{ $town->title }} </span>
        </div>
        </a>
      </div>
    </div>
    @endforeach
</div>












<h1 style="padding-top:20px;">{{ trans('lang.regions') }}</h1>


<div class="row top-experiences">
@foreach($regions as $region) 
    <div class="col-sm-3">
      <div class="card">
        <a href="{{ Baseurl($region->slug) }}">
        <div class="card-image">
          <img class="img-responsive lazy" data-src="{{ Imagepath($region->image) }}/w=400&h=360">
          <span class="card-title">{{ $region->title }} </span>
        </div>
        </a>
      </div>
    </div>
    @endforeach
</div>
    

<style type="text/css">
	.nav-new {
		background: #656c7a;
    height: 130px;
	}
</style>



<div class="container text-center">
{{ $regions->links() }}
</div>
</div>

@endsection