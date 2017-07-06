@extends('layouts.default')

@section('title',$sight->title)
@section('description',Ogdescription($sight->content))
@section('ogimage',Ogimagepath($sight->image))


@section('content')


<div class="container page-wrap">
<div class="header">
<h1>{{ $sight->title }}</h1>

<img class="lazy" data-src="{{ Imagepath($sight->image) }}/w=1170&h=420">
</div>
<div class="entry">
{!! $sight->content !!}
        <!-- /.row -->

</div>
<br>
<br>
<!--- save button -->
@include('sections/saveButton',['id'=>$sight->id,'type'=>'sight','title'=>$sight->title,'image'=>Imagepath($sight->image),'href'=>url()->current()])
<br>
<br>

<!--- share -->
@include('sections/social')
<!--- tags -->
@if($sight->tags)
<div class="post-tags">
</div>
@endif
<!--- comments -->
<div class="comments">
<h1>{{ trans('lang.leavecomment') }}</h1>
@include('sections.disqus')
</div>


</div><!-- /.entry -->

</div>


<style type="text/css">
	.nav-new {
		background: #656c7a;
    height: 130px;
	}
</style>














<div class="container">
<h2>{{ trans('lang.related_sights') }}</h2>
<div class="row">
@foreach($featured_sights as $featured_sight)
    	<div class="col-md-4 col-xs-12 col-sm-12">
        <ul class="list-group list-sights">
          
          <li>
            <a href="{{  Baseurl($featured_sight->parent->parent->slug."/".$featured_sight->parent->slug."/".$featured_sight->slug) }}">
            <img class="lazy" data-src="{{ Imagepath($featured_sight->image) }}//100x70">
            </a>
            <h3>{{ $featured_sight->title }}</h3>
            <p>{{ $featured_sight->description }}</p>
          </li>
             
          
        </ul>
      </div>
@endforeach
</div>
</div>





@endsection







