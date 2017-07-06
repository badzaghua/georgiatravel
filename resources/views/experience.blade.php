@extends('layouts.default')

@section('content')

@section('title',$experience->title)
@section('description',Ogdescription($experience->content))
@section('ogimage',Ogimagepath($experience->image))


@include('sections.halfSlider',['sliderCaption'=>$experience->title,'sliderImage'=>$experience->image])



<div class="page-bg">
<div class="header">
<h1 class="text-center">{{ $experience->title }}</h1>

</div>

<div class="container">
  <div class="page-text">
{!! $experience->content !!}
        <!-- /.row -->
  </div>
  
  
  
  
  


<div class="row">
@foreach($experience->children as $childExperience)
<div class="col-sm-4">
          <div class="blog-box">
              <a href="{{ Baseurl("experience/".$childExperience->slug) }}"><img data-src="{{ Imagepath($childExperience->image) }}/w=500&h=300"  class="img-responsive lazy"></a>
              <div class="blog-box-content">
                  <h1 class="blog-grid-title-md text-center"><a href="{{  Baseurl("experience/".$childExperience->slug) }}">{{ $childExperience->title }}</a></h1>
              </div>
          </div>
</div>
@endforeach
</div>
 
  
  
  
  
  
  
  
  
  
  
  
  
  
  <br>
  <br>
  <!--- save button -->
@include('sections/saveButton',['id'=>$experience->id,'type'=>'experience','title'=>$experience->title,'image'=>Imagepath($experience->image),'href'=>url()->current()])
<br>
<br>
  
<!--- share -->
@include('sections/social')


<!--- tags -->
@if($experience->tags)
<div class="post-tags">
</div>
@endif

</div><!-- /.entry -->
<div class="container-fluid page-break">
<h2 class="text-center">{{ trans('lang.related_experiences') }}</h2>
<div class="container">
@foreach($featured_experiences as $featured_experience)
    <div class="col-sm-4">
        <div class="blog-box">
          <a href="{{ Baseurl("/experience/$featured_experience->slug") }}"><img data-src="{{ Imagepath($featured_experience->image) }}/w=500&h=300"  class="img-responsive lazy"></a>
          <div class="blog-box-content">
              <h1 class="blog-grid-title-md text-center"><a href="{{ Baseurl("/experience/$featured_experience->slug") }}">{{ $featured_experience->title }}</a></h1>
        </div>
    </div>
    </div>
@endforeach
</div>
</div>

<!--- comments -->
<div class="container comments">
<h1>{{ trans('lang.leavecomment') }}</h1>
@include('sections.disqus')
</div>




<style type="text/css">
	.nav-new {
    height: 130px;
	}
</style>




</div>

@endsection







