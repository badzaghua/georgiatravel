@extends('layouts.default')

@section('title',trans('lang.register'))
@section('content')


<div class="container page-wrap">
<div class="container">
    <div class="row">
        <div class="col-md-12 loginmodal-container">
            <h1>{{ trans('lang.register') }}</h1>
            <br>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
	      {{ csrf_field() }}
        <a href="/auth/facebook"><img src='/img/facebook-login.png?123'></a>	
        <br>
        <br>
    		<input type="text" name="name" placeholder="{{ trans('lang.name') }}">
    		<input type="text" name="email" placeholder="E-mail">
    		<input type="password" name="password" placeholder="Password">
    		<input type="password" name="password_confirmation" placeholder="{{ trans('lang.reenter_password') }}">
    		<button type="submit" class="btn btn-primary pull-right" id="btnContactUs">{{ trans('lang.register') }}</button>
    	  </form>
        </div>
    </div>
</div>
</div>

<style type="text/css">
	.nav-new {
		background: #656c7a;
    height: 130px;
	}
</style>
@endsection
