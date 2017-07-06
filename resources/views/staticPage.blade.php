@extends('layouts.default')



@section('title',$staticPage->title)
@section('description',Ogdescription($staticPage->content))
@section('ogimage',Ogimagepath())


@section('content')


<div class="container">
<div class="container page-wrap">
<div class="header">
<h1>{{ $staticPage->title }}</h1>

</div>
</div>
<div class="entry">
{!! $staticPage->content !!}
        <!-- /.row -->
  



</div><!-- /.entry -->

</div>



<style type="text/css">
	.nav-new {
		background: #656c7a;
    height: 130px;
	}
</style>






@endsection