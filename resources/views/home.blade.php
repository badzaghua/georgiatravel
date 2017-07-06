@extends('layouts.default')



@section('title', trans('lang.mainpage'))
@section('description',Ogdescription())
@section('ogimage',Ogimagepath())

@section('content')

@include('sections.slider')

<div class="page-bg">
<div class="container">
<div class="row">
    <div class="col-md-12 col-xs-12- col-sm-12 welcome">
        <!--<h2 class="text-center">Why Georgia?</h2>-->
        <!--{!! $mainpage->caption !!}-->
    </div>
</div>

</div>

@if(in_array('experiences',$sections))
<div class="container">

    <div class="row hr_line">
        <div class="col-md-12">
            <h2 class="text-center hmargin">{{ trans('lang.topexperiences') }}</h2>
        </div>
    </div>
    
<div class="row top-experiences">
    @foreach($experiences as $experience)
<div class="col-sm-4">
          <div class="blog-box">
              <a href="{{ Baseurl("experience/".$experience->slug) }}"><img class="lazy img-responsive" data-src="{{ Imagepath($experience->image) }}/w=500&h=300"></a>
              <div class="blog-box-content">
                  <h1 class="blog-grid-title-md text-center"><a href="{{  Baseurl("experience/".$experience->slug) }}">{{ $experience->title }}</a></h1>
              </div>
          </div>
</div>
    @endforeach
</div>
    
</div>
@endif



@if(in_array('sights',$sections))
<div class="container-fluid hr_line page-break">  
<div class="container sights">
    <div class="col-md-12">
          <h2 class="text-center hmargin">{{ trans('lang.sightsfront') }}</h2>
      </div>@foreach($sights as $sight)
	<div class="col-md-4 col-xs-12 col-sm-12">
        <ul class="list-group list-sights">
          
          <li>
            <a href="{{ Baseurl($sight->parent->parent->slug.'/'.$sight->parent->slug.'/'.$sight->slug) }}">
            <img class="lazy" data-src="{{Imagepath( $sight->image) }}/100x70">
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


@if(in_array('destinations',$sections))
<div class="container-fluid destinations">

<div class="container hr_line">
<div class="col-md-12">
<h1 class="text-center hmargin">{{ trans('lang.destinations') }}</h1>
</div>
<div class="col-sm-6 text-left svg hidden-xs">

@include('sections.map')

</div>
<div class="col-sm-6 text-right">

<ul class='destinations'>
@foreach($towns as $town)
<li> <a class="city" href="{{ Baseurl($town->parent->slug.'/'.$town->slug) }}" data-region="{{ @$town->svgmap->data_region }}" ><h6><i class="fa fa-map-marker"></i> {{ $town->title }}</h6></a>
@endforeach
</ul>
</div>
</div>
</div>
@endif
      


<div class="container-fluid hr_line page-break hidden">  
<div class="container million">
    
<div class="video-background">
    <div class="video-foreground">
      <iframe src="https://www.youtube.com/embed/wj3v_UPRauY?controls=0&showinfo=0&rel=0&autoplay=0&loop=1&playlist=wj3v_UPRauY" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>

<div id="vidtop-content">
<div class="vid-info">
	  <h1>Dinner with Georgia</h1>
	  <p>"This is the most amazing experience I've ever had"
Jesper Black - 6 000 000th Tourist in Georgia
	 <a href="#"></a>
  </div>
</div>
          
</div>
</div>








      
      
@if(in_array('articles',$sections))
<div class="container hr_line">
    <div class="col-md-12">
        <h2 class="text-center hmargin">{{ trans('lang.recentarticles') }}</h2>
    </div>
    <div class="container">
  
<div class="row">        
<div class="col-md-10 col-md-offset-1">
          @foreach($articles as $article)
    <div class="article-box">
        <div class="col-md-5 col-sm-3 text-left article-img">
              <a class="story-img" href="#"><img class="lazy" data-src="{{ Imagepath($article->image) }}/383x250" class="img-square"></a>
            </div>
            <div class="col-md-7 col-sm-9 article-content">
              <a href="{{ Baseurl("/article/$article->slug") }}"><h3>{{ $article->title }}</h3></a>
              <div class="row">
                <div class="col-xs-10">
                  <p>{{ $article->description }}</p>
                
                  </div>
                <div class="col-xs-12"></div>
              </div>
              
            </div>
      </div>          
         @endforeach
</div>
        
</div>
          
        
  
        <hr>
        
        <div class="text-center"><a href="{{ Baseurl("/articles") }}">{{ trans('lang.seemore') }}</a></div>
        </div>
    </div>
@endif     
      
      
      
      
      
      
      
      </div>

@endsection