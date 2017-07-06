@extends('layouts.default')

@section('title',trans('lang.login'))
@section('content')


<div class="container page-wrap">
<div class="container">
    <div class="row">
        <div class="col-md-12 loginmodal-container">










    	    
   <div class="bd-example bd-example-tabs" role="tabpanel">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item active">
      <a class="nav-link active" id="login-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="home" aria-expanded="true">{{ trans('lang.login') }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="register-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile" aria-expanded="false">{{ trans('lang.register') }}</a>
    </li>    
    <li class="nav-item">
      <a class="nav-link" id="register-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="profile" aria-expanded="false">{{ trans('lang.forgot_password') }}</a>
    </li>
  </ul>
  
  
  
  <div class="tab-content" id="myTabContent">
      
      
    <div role="tabpanel" class="tab-pane active" id="tab1" role="tabpanel">
    	  <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
	      {{ csrf_field() }}
        <a href="/auth/facebook"><img src='/img/facebook-login.png?123'></a>	
        <br>
        <br>			      
    		<input type="text" name="email" placeholder="E-mail">
    		<input type="password" name="password" placeholder="{{ trans('lang.password') }}">
    		<button type="submit" class="btn btn-primary pull-right" id="btnContactUs">{{ trans('lang.login') }}</button>
    	  </form>
    	</div>




    <div class="tab-pane" id="tab2" role="tabpanel" role="tabpanel">
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





    <div class="tab-pane" id="tab3" role="tabpanel" role="tabpanel">
    	  <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
    	      {{ csrf_field() }}
    		<input type="text" name="email" placeholder="E-mail">
    		<button type="submit" class="btn btn-primary pull-right" id="btnContactUs">{{ trans('lang.reset') }}</button>
    	  </form>
    </div>




  </div>
</div>




















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
