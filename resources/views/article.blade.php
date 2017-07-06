@extends('layouts.default')


@section('title',$article->title )
@section('description',e($article->description))
@section('ogimage',Ogimagepath($article->image))

@section('content')


<div class="container page-wrap">
<div class="header">
<h1 class="text-center">{{ $article->title }}</h1>
<div class="author">
    <i class="fa fa-newspaper-o" title="Category"></i> 
    @foreach($categories as $category)
    <a href="{{  Baseurl("/articles/?category=".$category->title)  }}">{{$category->title}}</a> 
    @endforeach
   | 
   <i class="fa fa-calendar" title="Date"></i> <time datetime="2014-01-20">{{ $article->created_at->format("Y-m-d")  }}</time> 
   | 
   <i class="fa fa-eye" title="Views"></i> {{ $article->views }}

</div>
<img data-src="{{ Imagepath($article->image) }}/w=1170&h=420" class="img-responsive article-img lazy">
</div>
<div class="entry">
{!! html_entity_decode(ArticleFormatting($article->content)) !!}
        <!-- /.row -->
  
<!--- share -->
<!--- tags -->

<div class="col-sm-12">
	<!-- Tags -->
	<div class="post-tags">
	    @if($article->tags)
		<h3 class="side-title">Tags</h3>
		<div class="tagcloud">
		    @foreach(json_decode($article->tags) as $tag)
			<a href="{{ Baseurl("/articles?tag=$tag") }}" title="">{{ $tag }}</a>
			@endforeach
		</div>
		@endif
		
				<!--- save button -->
@include('sections/saveButton',['id'=>$article->id,'type'=>'article','title'=>$article->title,'image'=>Imagepath($article->image),'href'=>url()->current()])
<br>


		<h3 class="side-title">Share</h3>
		
		<div class="shareButtons">
			@include('sections/social')
		</div>
		

		
		
		<!--- comments -->
		<h3 class="side-title">Leave your reply</h3>
        <div class="comments">
        @include('sections.disqus')
        </div>

	</div>
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
<h2 class="text-center hmargin">{{ trans('lang.related_articles') }}</h2>
<div class="row">
<div class="col-md-10 col-md-offset-1">
@foreach($featured_articles as $featured_article)

    
        <div class="col-md-3 col-sm-3 text-left">
              <a class="story-img" href="{{ Baseurl("/article/$featured_article->slug") }}"><img data-src="{{ Imagepath($featured_article->image) }}/w=180&h=200" style="width:180px;height:200px" class="img-square lazy"></a>
            </div>
            <div class="col-md-9 col-sm-9 article">
              <a href="{{ Baseurl("/article/$featured_article->slug") }}"><h3>{{ $featured_article->title }}</h3></a>
              <div class="row">
                <div class="col-xs-10">
                  <p>{{ $article->description }}</p>
                
                  </div>
                <div class="col-xs-12"></div>
              </div>
              <br><br><br><hr>
            </div>
    
    
@endforeach
</div>
</div>
</div>














@endsection