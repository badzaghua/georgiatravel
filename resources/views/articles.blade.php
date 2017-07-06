<?
$langLinks = array('en'=>url('/en/articles'),'ru'=>'/ru/articles','ge'=>'/ge/articles');
?>
@extends('layouts.default',['langLinks'=>$langLinks])

@section('title',trans('lang.articles'))
@section('description',Ogdescription())
@section('ogimage',Ogimagepath())


@section('content')





<div class="container page-wrap">

<h1 style="padding:10px 0 30px 0;">{{ trans('lang.articles') }}
<sup>{{ $category . $tag  }}</sup>
</h1>

<div class="col-md-8">
<div class="row">
@foreach($articles as $article)


    
    
        <div class="col-md-3 col-sm-3 text-left">
              <a class="story-img" href="{{ Baseurl("article/".$article->slug) }}"><img data-src="{{ Imagepath($article->image) }}/w=180&h=200" style="width:180px;height:200px" class="img-square lazy"></a>
            </div>
            <div class="col-md-9 col-sm-9 article">
              <a href="{{ Baseurl("article/$article->slug") }}"><h3>{{ $article->title }}</h3></a>
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
<div class="col-md-4">
  <aside class="sidebar">  
    <div class="single category">
<h3 class="side-title">{{ trans('lang.category') }}</h3>
<ul class="list-unstyled">
	@foreach($articleCategories as $articleCategory)
<li><a href="{{ Baseurl("articles?category=$articleCategory->title") }}" title="">{{ $articleCategory->title }} <span class="pull-right"></span></a></li>
@endforeach
</ul>
</div>
<!-- Recent Posts -->
<div class="single recent">
<h3 class="side-title">{{ trans('lang.mostpopular') }}</h3>
<ul class="list-unstyled">
	
@foreach($popularArticles as $popularArticle)
<li>
	<a href="{{ Baseurl("article/$popularArticle->slug") }}">
	<div class="thumb lazy"><img data-src="{{ Imagepath($popularArticle->image) }}/50x50" alt=""></div>
	<div class="text">
		<h4>{{ $popularArticle->title }}</h4>
		<h6>{{ $popularArticle->created_at->format('Y-m-d') }}</h6>
	</div>
</a>
</li>
@endforeach
</ul>
</div>
    </aside>
    
</div>
</div>

<style type="text/css">
	.nav-new {
		background: #656c7a;
    height: 130px;
	}
</style>


<div class="container text-center">
  @if(isset($_GET['category']))
  {{ $articles->setPath("?category=$_GET[category]") }}
  @else
  {{ $articles->links() }}
  @endif
</div>
</div>

@endsection