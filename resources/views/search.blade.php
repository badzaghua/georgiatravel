@extends('layouts.default')

@section('content')
@section('title',trans('lang.search'))
@section('description',Ogdescription())
@section('ogimage',Ogimagepath())




<div class="container page-wrap search-result">
<h1>{{ trans('lang.searchresults') }}</h1>
        <!-- Products Row -->
<!-- content -->


<div class="row">
@foreach($results as $type=>$resulti)
@foreach($resulti as $result)

<div class="col-xs-6 col-sm-3 searchresult">
    <a href="{{ Prefixedurl($result,$type) }}">
        <img class="lazy" data-src="{{ Imagepath($result->image)  }}/250x140"></a>
    <h4 class="text-left">{{ str_limit($result->title,50) }} <sup>/{{ trans("lang.$type") }}</sup> </h4></a> 
    <br><br>
</div>  








@endforeach
@endforeach
</div>
</div>
<style type="text/css">
	.nav-new {
		background: #656c7a;
    height: 130px;
	}
</style>

@endsection


