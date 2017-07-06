<li><a href="#" data-toggle="modal" data-target="#login-modal" class="small login">{{ trans('lang.login') }}</a>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    	<div class="loginmodal-container">
    	    
    	    
    	    
    	    
   <div class="bd-example bd-example-tabs" role="tabpanel">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item active">
      <a class="nav-link active" id="login-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">{{ trans('lang.login') }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="profile" aria-expanded="false">{{ trans('lang.register') }}</a>
    </li>    
    <li class="nav-item">
      <a class="nav-link" id="register-tab" data-toggle="tab" href="#forgot_password" role="tab" aria-controls="profile" aria-expanded="false">{{ trans('lang.forgot_password') }}</a>
    </li>
  </ul>
  
  
  
  <div class="tab-content" id="myTabContent">
      
      
    <div role="tabpanel" class="tab-pane active" id="home" role="tabpanel">
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




    <div class="tab-pane" id="register" role="tabpanel" role="tabpanel">
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





    <div class="tab-pane" id="forgot_password" role="tabpanel" role="tabpanel">
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
   
   
   
   
   
   
   
   
   





























