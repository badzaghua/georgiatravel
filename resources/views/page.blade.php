<?php
$langLinks = Helper::langLinks('content','',$content->trid);
?>
@extends('layouts.default',['langLinks'=>$langLinks])


@section('title',$content->title)
@section('description',Ogdescription())
@section('ogimage',Ogimagepath())


@section('content')


@if(count($content->slider))
<div id="mycarousel" class="carousel slide" data-ride="carousel" style="height: 520px;">
  <!-- Wrapper for slides -->
<div class="carousel-inner destinationc-view" role="listbox">
<?php $slideStatus='active'; ?>
@foreach($content->slider as $sliderItem) 
@if($sliderItem->type=='video')
<div id="player" style="width: 100%; height: 820px; margin-top:-150px;"></div>

    <script>
          var tag = document.createElement('script');
      tag.src = "http://www.youtube.com/player_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubePlayerAPIReady() {
        player = new YT.Player('player', {
          playerVars: { 'autoplay': 1, 'controls': 0,'autohide':1,'rel':0,'wmode':'opaque' },
          videoId: '{{ $sliderItem->youtube_id }}',
          events: {
            'onReady': onPlayerReady}
        });
      }
      

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.mute();
      }
      </script>
@else
<div class="item {{ $slideStatus }}"  style="background-image: url('/intervention/1400/600{{ $sliderItem->guid }}');">
    <div class="carousel-caption">
        <h2 class="fadeIn wow" data-wow-delay="0.5s">{{ $content->title }} </h2>
        
    </div>
</div>
@endif
<?php $slideStatus=NULL; ?>
@endforeach

  <!-- Controls -->
  <a class="left carousel-control {{  count($content->slider) >1 ? '' : 'hidden' }}" href="#mycarousel" role="button" data-slide="prev">
  <i class="fa fa-long-arrow-left"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control {{  count($content->slider) >1 ? '' : 'hidden' }}" href="#mycarousel" role="button" data-slide="next">
   <i class="fa fa-long-arrow-right"></i>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>


@endif

       

@if(!count($content->slider))
<div id="mycarousel" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner destinationc-view" role="listbox">
<div class="item active"  style="background-image: url('/intervention/1400/600{{ $content->featured_photo }}');">
    <div class="carousel-caption">
        <h2 class="fadeIn wow" data-wow-delay="0.5s">{{ $content->title }} </h2>
    </div>
</div>
</div>
</div>
@endif


<div class="container page-content">
<div class='page-navig-links'>
<a href="{{ Helper::gt_baseurl() }}"><i class="fa fa-home"></i> {{ trans('lang.home_bread') }}</a> <i class="fa fa-chevron-right"></i>   
<?php $parent = App\content::where('id',$content->parent)->first(); ?>
@if($parent)
<a href="{{ Helper::gt_baseurl($parent->title) }}">{{ $parent->title }}</a> <i class="fa fa-chevron-right"></i>   
<a href="#" disabled>{{ $content->title }}</a>
@endif
</div>


<section>
<div class='entry'>



<?= Html::decode(Helper::contentFormatting($content->content)) ?>
        <!-- /.row -->
</div>



@if(count($content->children))
@include('sections.blocks',['children'=>$content->children])
@else


@include('sections.social')
@include('sections.save')

        <!-- Products Row -->
<section class="main-whattodo">
<h2>{{ trans('lang.related_pages') }}</h2>
<?php $related = \App\Content::whereNotNull('featured_photo')->where('parent', $content->parent)->where('id','<>',$content->id)->take(3)->orderBy('name','asc')->get(); ?>
@include('sections.blocks',['children'=>$related])
</section>
@endif




<?
$contentMeta = $content->contentMeta; 
foreach($contentMeta as $meta)
{
  if($meta->meta_key=='place_city') Helper::places($meta->meta_value);
}

?>





<style>
.carousel, .carousel-inner {
  height: 1;
}

</style>

</section>


</div>
@endsection


