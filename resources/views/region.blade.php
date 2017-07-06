@extends('layouts.default')


@section('title',$region->title)
@section('description',e($region->content))
@section('ogimage',Ogimagepath($region->image))


@section('content')


@include('sections.halfSlider',['sliderCaption'=>$region->title,'sliderImage'=>$region->image])

<div class="page-bg">
<div class="container">
    <div class="page-text">
{!! $region->content !!}
        <!-- /.row -->
    </div>
    
    
<br>
<br>
<!--- save button -->
@include('sections/saveButton',['id'=>$region->id,'type'=>'destination','title'=>$region->title,'image'=>Imagepath($region->image),'href'=>url()->current()])
<br>
<br>



<!--- share -->
@include('sections/social')
<!--- tags -->
@if($region->tags)
<div class="post-tags">
</div>
@endif
<!--- comments -->
<div class="comments">
<h1>{{ trans('lang.leavecomment') }}</h1>
@include('sections.disqus')
</div>


</div><!-- /.entry -->



<style type="text/css">
	.nav-new {
    height: 130px;
	}
</style>





<div class="container magazine">

<h1 style="padding-top:20px;">{{ trans('lang.towns') }}</h1>

<div class="row">
@foreach($towns as $town)
    <div class="town-panel">
        <div class="col-xs-12 col-sm-6 col-lg-4">
            <div class="panel panel-default">
            <div class="panel-body">
            <div class="col-md-12">
              
                <a href="{{ Baseurl("$region->slug/$town->slug") }}"><img class="lazy" data-src="{{ Imagepath($town->image) }}/w=360&h=240"></a>
              
              <div class="town-style">
              <div class="author">
    

</div>
                <a href="{{ Baseurl("$region->slug/$town->slug") }}"><h2>{{ $town->title }}</h2></a>
                {{ $town->description }}
                <div class="btn-groups">

                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
@endforeach
</div>


</div>






</div>











<!--<div class="container">-->
<!--<h2>{{ trans('lang.related_regions') }}</h2>-->
<!--<div class="row">-->
<!--@foreach($featured_regions as $featured_region)-->
<!--    <div class="post-panel">-->
<!--        <div class="col-xs-12 col-sm-6 col-lg-4">-->
<!--            <div class="panel panel-default">-->
<!--            <div class="panel-body">-->
<!--            <div class="col-md-12">-->
              
<!--                <a href="{{ Baseurl("$featured_region->slug") }} "><img class="lazy" data-src="{{ Imagepath($featured_region->image) }}/w=360&h=207"></a>-->
              
<!--              <div class="post-style">-->
<!--                <a href="{{ Baseurl("$featured_region->slug") }}"><h3>{{ $featured_region->title }}</h3></a>-->
<!--                <div class="btn-groups">-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        </div>-->
<!--    </div>-->
<!--@endforeach-->
<!--</div>-->
<!--</div>-->





@endsection







