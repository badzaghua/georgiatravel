@extends('layouts.default')


@section('title',$town->title)
@section('description',Ogdescription($town->content))
@section('ogimage',Ogimagepath($town->image))



@section('content')

@include('sections.slider',['sliderCaption'=>$town->title,'sliderImage'=>$town->image])



<div class="page-bg">

<div class="container">
<div class="header">
<h1 class="text-center"> {{ $town->title }}</h1>

</div>

<div class="container">
    <div class="page-text">
{!! $town->content !!}
        <!-- /.row -->
 </div>

</div><!-- /.entry -->



<br>
<br>
<!--- save button -->
@include('sections/saveButton',['id'=>$town->id,'type'=>'destination','title'=>$town->title,'image'=>Imagepath($town->image),'href'=>url()->current()])
<br>
<br>



<!--- share -->
@include('sections/social')

</div>

@if($sights->count())
	<div class="container-fluid page-break sights hr_line">
	    <div class="container">
	    <div class="col-md-12">
            <h2 class="text-center">{{ trans('lang.sightsfront') }}</h2>
        </div>
            @foreach($sights as $sight)
		<div class="col-md-4 col-xs-12 col-sm-12">
          <ul class="list-group">
            <li>
              <a class="sight" href="{{ Baseurl($town->parent->slug.'/'.$town->slug.'/'.$sight->slug) }}">
              <img class="lazy" data-src="{{ Imagepath($sight->image) }}/100x70">

              <h3>{{ $sight->title }}</h3>
              <p>{{ str_limit($sight->description, 100) }}</p>
                            </a>
            </li>
               
            
          </ul>
        </div>
@endforeach
    </div>
	</div>
 @endif
  
<!--- tags -->
@if($town->tags)
<div class="post-tags">
</div>
@endif
<!--- comments
<div class="container comments">
<h1>{{ trans('lang.leavecomment') }}</h1>
@include('sections.disqus')
</div>
 -->



<style type="text/css">
	.nav-new {
    height: 130px;
	}
</style>





<div class="container">
<h2>{{ trans('lang.related_towns') }}</h2>
<div class="row">
@foreach($featured_towns as $featured_town)
    <div class="col-sm-3">
      <div class="card">
        <a href="{{ Baseurl($featured_town->parent->slug.'/'.$featured_town->slug) }}">
        <div class="card-image">
          <div class="card-gradient"></div>
          <img class="img-responsive lazy" data-src="{{ Imagepath($featured_town->image) }}/w=400&h=360">
          <span class="card-title">{{ $featured_town->title }}</span>
        </div>
        </a>
      </div>
    </div>
@endforeach
</div>
</div>





</div>


@endsection




