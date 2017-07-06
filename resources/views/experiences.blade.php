<?
$langLinks = array('en'=>url('/en/experiences'),'ru'=>'/ru/experiences','ge'=>'/ge/experiences');
?>
@extends('layouts.default')

@section('title',trans('lang.experiences'))
@section('description',Ogdescription())
@section('ogimage',Ogimagepath())



@section('content')




<div class="container page-wrap">

<h1 style="padding-top:20px;" class="text-center">{{ trans('lang.experiences') }}</h1>

<div class="row">
@foreach($experiences as $experience)
<div class="col-sm-4">
          <div class="blog-box">
              <a href="{{ Baseurl("experience/".$experience->slug) }}"><img data-src="{{ Imagepath($experience->image) }}/w=500&h=300"  class="lazy img-responsive"></a>
              <div class="blog-box-content">
                  <h1 class="blog-grid-title-md text-center"><a href="{{  Baseurl("experience/".$experience->slug) }}">{{ $experience->title }}</a></h1>
              </div>
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
{{ $experiences->links() }}
</div>
</div>

@endsection